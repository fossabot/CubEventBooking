<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\Mailer\Email;
use Cake\I18n\Time;
use Cake\ORM\TableRegistry;
use Cake\Mailer\MailerAwareTrait;
use Cake\Network\Http\Client;

/**
 * Notifications Controller
 *
 * @property \App\Model\Table\NotificationsTable $Notifications
 */
class NotificationsController extends AppController
{

    use MailerAwareTrait;

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Notificationtypes']
        ];
        $this->set('notifications', $this->paginate($this->Notifications));
        $this->set('_serialize', ['notifications']);
    }

    public function unread()
    {
        $this->paginate = [
            'contain' => ['Users', 'Notificationtypes'],
            'conditions' => ['user_id' => $this->Auth->user('id'), 'new' => 1]
        ];
        $this->set('notifications', $this->paginate($this->Notifications));
        $this->set('_serialize', ['notifications']);
    }

    /**
     * View method
     *
     * @param string|null $id Notification id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $notification = $this->Notifications->get($id, [
            'contain' => ['Users', 'Notificationtypes']
        ]);
        $this->set('notification', $notification);
        $this->set('_serialize', ['notification']);

        /*$now = Time::now();
        $nowData = ['new' => 0, 'read_date' => $now];

        if ($notification->new == 1) {
            $notification = $this->Notifications->patchEntity($notification, $nowData);

            if ($this->Notifications->save($notification)) {
                $this->Flash->success(__('The notification has been marked as viewed.'));
            } else {
                $this->Flash->error(__('The notification could not be marked as viewed. Please, try again.'));
            }
        }*/        
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $notification = $this->Notifications->newEntity();
        if ($this->request->is('post')) {
            $notification = $this->Notifications->patchEntity($notification, $this->request->data);
            if ($this->Notifications->save($notification)) {
                $this->Flash->success(__('The notification has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The notification could not be saved. Please, try again.'));
            }
        }
        $users = $this->Notifications->Users->find('list', ['limit' => 200]);
        $notificationtypes = $this->Notifications->Notificationtypes->find('list', ['limit' => 200]);
        $this->set(compact('notification', 'users', 'notificationtypes'));
        $this->set('_serialize', ['notification']);
    }

    public function welcome($userId = null)
    {
        if(isset($userId)) {

            $users = TableRegistry::get('Users');
            $groups = TableRegistry::get('Scoutgroups');

            $user = $users->get($userId, ['contain' => ['Scoutgroups']]);
            $group = $groups->get($user->scoutgroup_id);

            $welcomeData = [     'link_id' => $userId
                                , 'link_controller' => 'Users'
                                , 'link_action' => 'view'
                                , 'link_prefix' => false
                                , 'notificationtype_id' => 1
                                , 'user_id' => $userId
                                , 'text' => 'This system has been designed to take bookings for Hertfordshire Cubs. Thank-you for signing up.'
                                , 'notification_header' => 'Welcome to the Herts Cubs Booking System'
                                , 'notification_source' => 'Admin Triggered'
                                , 'new' => 1];

            $notification = $this->Notifications->newEntity();

            $notification = $this->Notifications->patchEntity($notification, $welcomeData);

            if ($this->Notifications->save($notification)) {
                $this->Flash->success(__('Welcome to the Booking System. We have sent a welcome email.'));

                $this->getMailer('User')->send('welcome', [$user, $group, $notification]);

                $sets = TableRegistry::get('Settings');

                $jsonWelcome = json_encode($welcomeData);
                $w_api_key = $sets->get(13)->text;
                $projectId = $sets->get(14)->text;
                $eventType = 'UserWelcome';

                $keenURL = 'https://api.keen.io/3.0/projects/' . $projectId . '/events/' . $eventType . '?api_key=' . $w_api_key;

                $http = new Client();
                $response = $http->post(
                  $keenURL,
                  $jsonWelcome,
                  ['type' => 'json']
                );

                $genericType = 'Notification';

                $keenGenURL = 'https://api.keen.io/3.0/projects/' . $projectId . '/events/' . $genericType . '?api_key=' . $w_api_key;

                $http = new Client();
                $response = $http->post(
                  $keenGenURL,
                  $jsonWelcome,
                  ['type' => 'json']
                );

                return $this->redirect(['prefix' => 'admin', 'controller' => 'Users',  'action' => 'view', $userId]);
            } else {
                $this->Flash->error(__('The notification could not be saved. Please, try again.'));
            }
        } else {
            $this->Flash->error(__('Parameters were not set!'));
            return $this->redirect(['prefix' => 'admin',  'controller' => 'Landing', 'action' => 'admin_home']);
        }
    }

    public function newPayment($payId = null)
    {
        if(isset($payId)) {

            $users = TableRegistry::get('Users');
            $groups = TableRegistry::get('Scoutgroups');
            $invoices = TableRegistry::get('Invoices');
            $payments = TableRegistry::get('Payments');

            $payment = $payments->get($payId);

            $invoice_sel = $invoices->find('all')
            ->hydrate(true)
            ->join([
                'x' => ['table' => 'invoices_payments', 'type' => 'INNER', 'conditions' => 'x.invoice_id = Invoices.id',],
                't' => ['table' => 'payments','type' => 'INNER','conditions' => 't.id = x.payment_id',]
            ])
            ->where(['t.id' => $payId])
            ->first();

            $invoice_id = $invoice_sel->id;

            $invoice = $invoices->get($invoice_id);

            $user = $users->get($invoice->user_id, ['contain' => ['Scoutgroups']]);
            $group = $groups->get($user->scoutgroup_id);

            $paymentData = [     'link_id' => $invoice->id
                                , 'link_controller' => 'Invoices'
                                , 'link_action' => 'view'
                                , 'notificationtype_id' => 2
                                , 'user_id' => $invoice->user_id
                                , 'text' => 'We have received a payment and have recorded it against your invoice. Please check that everything is in order.'
                                , 'notification_header' => 'A payment has been recorded.'
                                , 'notification_source' => 'System Generated'
                                , 'new' => 1];

            $notification = $this->Notifications->newEntity();

            $notification = $this->Notifications->patchEntity($notification, $paymentData);

            if ($this->Notifications->save($notification)) {
                $this->Flash->success(__('Payment Notification Sent.'));

                $this->getMailer('Payment')->send('payment', [$user, $group, $notification, $invoice, $payment]);

                $jsonPayment = json_encode($paymentData);
                $p_api_key = $sets->get(13)->text;
                $projectId = $sets->get(14)->text;
                $eventType = 'NewPayment';

                $keenURL = 'https://api.keen.io/3.0/projects/' . $projectId . '/events/' . $eventType . '?api_key=' . $p_api_key;

                $http = new Client();
                $response = $http->post(
                  $keenURL,
                  $jsonPayment,
                  ['type' => 'json']
                );

                $genericType = 'Notification';

                $keenGenURL = 'https://api.keen.io/3.0/projects/' . $projectId . '/events/' . $genericType . '?api_key=' . $p_api_key;

                $http = new Client();
                $response = $http->post(
                  $keenGenURL,
                  $jsonPayment,
                  ['type' => 'json']
                );

                return $this->redirect(['controller' => 'Payments', 'action' => 'add', 'prefix' => 'admin']);
            } else {
                $this->Flash->error(__('The notification could not be saved. Please, try again.'));
            }
        } //else {
        //     $this->Flash->error(__('Parameters were not set!'));
        //     return $this->redirect(['action' => 'index']);
        // }
    }

    public function notifyPayment($payId = null)
    {
        if(isset($payId)) {

            $users = TableRegistry::get('Users');
            $groups = TableRegistry::get('Scoutgroups');
            $invoices = TableRegistry::get('Invoices');
            $payments = TableRegistry::get('Payments');

            $payment = $payments->get($payId);

            $invoice_sel = $invoices->find('all')
            ->hydrate(true)
            ->join([
                'x' => ['table' => 'invoices_payments', 'type' => 'INNER', 'conditions' => 'x.invoice_id = Invoices.id',],
                't' => ['table' => 'payments','type' => 'INNER','conditions' => 't.id = x.payment_id',]
            ])
            ->where(['t.id' => $payId])
            ->first();

            $invoice_id = $invoice_sel->id;

            $invoice = $invoices->get($invoice_id);

            $user = $users->get($invoice->user_id, ['contain' => ['Scoutgroups']]);
            $group = $groups->get($user->scoutgroup_id);

            $paymentData = [     'link_id' => $invoice->id
                                , 'link_controller' => 'Invoices'
                                , 'link_action' => 'view'
                                , 'notificationtype_id' => 2
                                , 'user_id' => $invoice->user_id
                                , 'text' => 'We have received a payment and have recorded it against your invoice. Please check that everything is in order.'
                                , 'notification_header' => 'A payment has been recorded.'
                                , 'notification_source' => 'Admin Triggered'
                                , 'new' => 1];

            $notification = $this->Notifications->newEntity();

            $notification = $this->Notifications->patchEntity($notification, $paymentData);

            if ($this->Notifications->save($notification)) {
                $this->Flash->success(__('Payment Notification Sent.'));

                $this->getMailer('Payment')->send('payment', [$user, $group, $notification, $invoice, $payment]);

                $sets = TableRegistry::get('Settings');

                $jsonPayment = json_encode($paymentData);
                $p_api_key = $sets->get(13)->text;
                $projectId = $sets->get(14)->text;
                $eventType = 'NewPayment';

                $keenURL = 'https://api.keen.io/3.0/projects/' . $projectId . '/events/' . $eventType . '?api_key=' . $p_api_key;

                $http = new Client();
                $response = $http->post(
                  $keenURL,
                  $jsonPayment,
                  ['type' => 'json']
                );

                $genericType = 'Notification';

                $keenGenURL = 'https://api.keen.io/3.0/projects/' . $projectId . '/events/' . $genericType . '?api_key=' . $p_api_key;

                $http = new Client();
                $response = $http->post(
                  $keenGenURL,
                  $jsonPayment,
                  ['type' => 'json']
                );

                return $this->redirect(['controller' => 'Payments', 'action' => 'index', 'prefix' => 'admin']);
            } else {
                $this->Flash->error(__('The notification could not be saved. Please, try again.'));
            }
        } //else {
        //     $this->Flash->error(__('Parameters were not set!'));
        //     return $this->redirect(['action' => 'index']);
        // }
    }

    public function deposit_query($invoiceId = null)
    {
        if(isset($invoiceId)) {

            $invs = TableRegistry::get('Invoices');
            $users = TableRegistry::get('Users');
            $groups = TableRegistry::get('Scoutgroups');

            $invoice = $invs->get($invoiceId,['contain' => ['Users']]);

            $user = $users->get($invoice->user_id, ['contain' => ['Scoutgroups']]);
            $group = $groups->get($user->scoutgroup_id);

            $invQueryData = [     'link_id' => $user->id
                                , 'link_controller' => 'Users'
                                , 'link_action' => 'view'
                                , 'notificationtype_id' => 1
                                , 'user_id' => $user->id
                                , 'text' => 'This system has been designed to take bookings for Hertfordshire Cubs. Thank-you for signing up.'
                                , 'notification_header' => 'Welcome to the Herts Cubs Booking System'
                                , 'notification_source' => 'System Generated'
                                , 'new' => 1];

            $notification = $this->Notifications->newEntity();

            $notification = $this->Notifications->patchEntity($notification, $welcomeData);

            if ($this->Notifications->save($notification)) {
                $this->Flash->success(__('Welcome to the Booking System. We have sent a welcome email.'));

                $this->getMailer('User')->send('welcome', [$user, $group, $notification]);

                return $this->redirect(['controller' => 'Users', 'action' => 'login', 'prefix' => false, $userId]);
            } else {
                $this->Flash->error(__('The notification could not be saved. Please, try again.'));
            }
        } //else {
        //     $this->Flash->error(__('Parameters were not set!'));
        //     return $this->redirect(['action' => 'index']);
        // }
    }

    public function noInv($appId = null)
    {
        if(isset($appId)) {

            $users = TableRegistry::get('Users');
            $groups = TableRegistry::get('Scoutgroups');

            $user = $users->get($userId, ['contain' => ['Scoutgroups']]);
            $group = $groups->get($user->scoutgroup_id);

            $welcomeData = [     'link_id' => $userId
                                , 'link_controller' => 'Users'
                                , 'link_action' => 'view'
                                , 'link_prefix' => false
                                , 'notificationtype_id' => 1
                                , 'user_id' => $userId
                                , 'text' => 'This system has been designed to take bookings for Hertfordshire Cubs. Thank-you for signing up.'
                                , 'notification_header' => 'Welcome to the Herts Cubs Booking System'
                                , 'notification_source' => 'System Generated'
                                , 'new' => 1];

            $notification = $this->Notifications->newEntity();

            $notification = $this->Notifications->patchEntity($notification, $welcomeData);

            if ($this->Notifications->save($notification)) {
                $this->Flash->success(__('Welcome to the Booking System. We have sent a welcome email.'));

                $this->getMailer('User')->send('welcome', [$user, $group, $notification]);

                /*$email = new Email('default');
                $email->template('welcome', 'default')
                    ->emailFormat('html')
                    ->to([$user->email => $user->full_name])
                    ->from(['info@hertscubs.uk' => 'HertsCubs Booking Site'])
                    ->subject('Welcome to the Hertfordshire Cubs Booking System')
                    ->setHeaders(['X-MC-Tags' => 'WelcomeEmail,Type1,Notification'
                        , 'X-MC-AutoText' => true
                        , 'X-MC-GoogleAnalytics' => 'hertscubs100.uk,hertscubs.uk,hcbooking.uk,booking.hertscubs100.uk,champions.hertscubs100.uk,booking.hertscubs.uk'
                        , 'X-MC-GoogleAnalyticsCampaign' => 'Welcome_Email'
                        , 'X-MC-TrackingDomain' => 'track.hertscubs.uk' ])
                    ->viewVars(['username' => $user->username
                        , 'date_created' => $user->created
                        , 'full_name' => $user->full_name
                        , 'scoutgroup' => $group->scoutgroup
                        , 'link_controller' => $notification->link_controller
                        , 'link_action' => $notification->link_action
                        , 'link_id' => $notification->link_id
                        , 'link_prefix' => $notification->link_prefix
                        , 'notification_id' => $notification->id
                        ])
                    ->helpers(['Html', 'Text', 'Time'])
                    ->send();*/

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The notification could not be saved. Please, try again.'));
            }
        } else {
            $this->Flash->error(__('Parameters were not set!'));
            return $this->redirect(['action' => 'index']);
        }
    }

    public function multipleInv($appId = null)
    {
        if(isset($appId)) {

            $users = TableRegistry::get('Users');
            $groups = TableRegistry::get('Scoutgroups');

            $user = $users->get($userId, ['contain' => ['Scoutgroups']]);
            $group = $groups->get($user->scoutgroup_id);

            $welcomeData = [     'link_id' => $userId
                                , 'link_controller' => 'Users'
                                , 'link_action' => 'view'
                                , 'link_prefix' => false
                                , 'notificationtype_id' => 1
                                , 'user_id' => $userId
                                , 'text' => 'This system has been designed to take bookings for Hertfordshire Cubs. Thank-you for signing up.'
                                , 'notification_header' => 'Welcome to the Herts Cubs Booking System'
                                , 'notification_source' => 'System Generated'
                                , 'new' => 1];

            $notification = $this->Notifications->newEntity();

            $notification = $this->Notifications->patchEntity($notification, $welcomeData);

            if ($this->Notifications->save($notification)) {
                $this->Flash->success(__('Welcome to the Booking System. We have sent a welcome email.'));

                $this->getMailer('User')->send('welcome', [$user, $group, $notification]);

                /*$email = new Email('default');
                $email->template('welcome', 'default')
                    ->emailFormat('html')
                    ->to([$user->email => $user->full_name])
                    ->from(['info@hertscubs.uk' => 'HertsCubs Booking Site'])
                    ->subject('Welcome to the Hertfordshire Cubs Booking System')
                    ->setHeaders(['X-MC-Tags' => 'WelcomeEmail,Type1,Notification'
                        , 'X-MC-AutoText' => true
                        , 'X-MC-GoogleAnalytics' => 'hertscubs100.uk,hertscubs.uk,hcbooking.uk,booking.hertscubs100.uk,champions.hertscubs100.uk,booking.hertscubs.uk'
                        , 'X-MC-GoogleAnalyticsCampaign' => 'Welcome_Email'
                        , 'X-MC-TrackingDomain' => 'track.hertscubs.uk' ])
                    ->viewVars(['username' => $user->username
                        , 'date_created' => $user->created
                        , 'full_name' => $user->full_name
                        , 'scoutgroup' => $group->scoutgroup
                        , 'link_controller' => $notification->link_controller
                        , 'link_action' => $notification->link_action
                        , 'link_id' => $notification->link_id
                        , 'link_prefix' => $notification->link_prefix
                        , 'notification_id' => $notification->id
                        ])
                    ->helpers(['Html', 'Text', 'Time'])
                    ->send();*/

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The notification could not be saved. Please, try again.'));
            }
        } else {
            $this->Flash->error(__('Parameters were not set!'));
            return $this->redirect(['action' => 'index']);
        }
    }

    public function newLogistic()
    {
        $notification = $this->Notifications->newEntity();
        if ($this->request->is('post')) {
            $notification = $this->Notifications->patchEntity($notification, $this->request->data);
            if ($this->Notifications->save($notification)) {
                $this->Flash->success(__('The notification has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The notification could not be saved. Please, try again.'));
            }
        }
        $users = $this->Notifications->Users->find('list', ['limit' => 200]);
        $notificationtypes = $this->Notifications->Notificationtypes->find('list', ['limit' => 200]);
        $this->set(compact('notification', 'users', 'notificationtypes'));
        $this->set('_serialize', ['notification']);
    }

    public function newReset()
    {
        $notification = $this->Notifications->newEntity();
        if ($this->request->is('post')) {
            $notification = $this->Notifications->patchEntity($notification, $this->request->data);
            if ($this->Notifications->save($notification)) {
                $this->Flash->success(__('The notification has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The notification could not be saved. Please, try again.'));
            }
        }
        $users = $this->Notifications->Users->find('list', ['limit' => 200]);
        $notificationtypes = $this->Notifications->Notificationtypes->find('list', ['limit' => 200]);
        $this->set(compact('notification', 'users', 'notificationtypes'));
        $this->set('_serialize', ['notification']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Notification id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $notification = $this->Notifications->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $notification = $this->Notifications->patchEntity($notification, $this->request->data);
            if ($this->Notifications->save($notification)) {
                $this->Flash->success(__('The notification has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The notification could not be saved. Please, try again.'));
            }
        }
        $users = $this->Notifications->Users->find('list', ['limit' => 200]);
        $notificationtypes = $this->Notifications->Notificationtypes->find('list', ['limit' => 200]);
        $this->set(compact('notification', 'users', 'notificationtypes'));
        $this->set('_serialize', ['notification']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Notification id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $notification = $this->Notifications->get($id);
        if ($this->Notifications->delete($notification)) {
            $this->Flash->success(__('The notification has been deleted.'));
        } else {
            $this->Flash->error(__('The notification could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
