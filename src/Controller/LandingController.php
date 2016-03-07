<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class LandingController extends AppController
{

    /**
     * Displays a view
     *
     * @return void|\Cake\Network\Response
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
    public function userHome()
    {
        // Get Entities from Registry
        $apps = TableRegistry::get('Applications');
        $atts = TableRegistry::get('Attendees');
        $invs = TableRegistry::get('Invoices');
        $usrs = TableRegistry::get('Users');
        $pays = TableRegistry::get('Payments');
        $evs = TableRegistry::get('Events');

        $now = Time::now();

        $userId = $this->Auth->user('id');

        // Table Entities
        $applications = $apps->find()->contain(['Users','Scoutgroups'])->order(['Applications.modified' => 'DESC'])->limit(5);
        $events = $evs->find()->where(['end >' => $now, 'live' => 1])->contain(['Settings'])->order(['Events.start' => 'ASC']);
        $invoices = $invs->find()->contain(['Users','Applications'])->order(['Invoices.created' => 'DESC'])->limit(5);
        $users = $usrs->find()->contain(['Roles','Scoutgroups'])->order(['Users.modified' => 'DESC'])->limit(5);
        $payments = $pays->find()->contain(['Invoices'])->order(['Payments.created' => 'DESC'])->limit(5);

        // Pass to View
        $this->set(compact('applications', 'events','invoices','users','payments'));

        // Counts of Entities
        $countApplications = $apps->find('all',['conditions' => ['user_id' => $userId]])->count('*');
        $countAttendees = $atts->find('all',['conditions' => ['user_id' => $userId]])->count('*');
        $countInvoices = $invs->find('all',['conditions' => ['user_id' => $userId]])->count('*');
        $countPayments = $pays->find('all')->matching('Invoices', function ($q) {
                return $q->where(['Invoices.user_id' => $this->Auth->user('id')]);
            })->count('*');

        // Pass to View
        $this->set(compact('countApplications', 'countAttendees','countInvoices','countPayments','userId'));
    }

    public function welcome($eventId = null)
    {
        // Set the layout.
        $this->viewBuilder()->layout('outside');

        if ($this->request->is('get'))
        {
            $usr = $this->Auth->user('id');
            if (isset($usr))
            {
                if ($this->Auth->user('authrole') === 'admin')
                { return $this->redirect(['controller' => 'Landing', 'prefix' => 'admin', 'action' => 'admin_home']);
                } elseif ($this->Auth->user('authrole') === 'champion')
                { return $this->redirect(['controller' => 'Landing', 'prefix' => 'champion', 'action' => 'champion_home']);
                } else
                { return $this->redirect(['controller' => 'Landing', 'prefix' => false, 'action' => 'user_home']);
                }
            }
        }

        $this->set(compact('eventId'));
    }

    public function beforeFilter(\Cake\Event\Event $event)
    {
        $this->Auth->allow(['welcome']);
    }
}