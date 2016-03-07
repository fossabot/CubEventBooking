<?

namespace App\Mailer;

use Cake\Mailer\Mailer;

class PaymentMailer extends Mailer
{
    public function payment($user = null, $group = null, $notification = null, $invoice = null, $payment = null) {
        // $email = new Email('default');
        if (isset($user) && isset($group) && isset($payment) && isset($notification) && isset($invoice) && isset($group)) {
            $this->template('payment', 'default')
                ->emailFormat('html')
                ->to([$user->email => $user->full_name])
                ->from(['info@hertscubs.uk' => 'HertsCubs Booking Site'])
                ->subject('New Payment Received')
                ->setHeaders(['X-MC-Tags' => 'PaymentEmail,Type2,Notification'
                        , 'X-MC-AutoText' => true
                        , 'X-MC-GoogleAnalytics' => 'hertscubs100.uk,hertscubs.uk,hcbooking.uk,booking.hertscubs100.uk,champions.hertscubs100.uk,booking.hertscubs.uk'
                        , 'X-MC-GoogleAnalyticsCampaign' => 'Payment_Email'
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
                        , 'initialvalue' => $invoice->initialvalue
                        , 'value' => $invoice->value
                        , 'payment_value' => $payment->value
                        , 'payment_id' => $payment->id
                        , 'invoice_id' => $invoice->id
                        , 'balance' => $invoice->balance
                        ])
                ->helpers(['Html', 'Text', 'Time']);
                //->send(); 
        }
                                 
    }
}