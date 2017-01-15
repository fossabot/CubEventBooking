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
namespace App\Controller\Champion;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use Cake\Mailer\Email;
use App\Controller\Champion\AppController;

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
    public function championHome()
    {
        // Get Entities from Registry
        $this->Applications = TableRegistry::get('Applications');
        $this->Events = TableRegistry::get('Events');
        $this->Invoices = TableRegistry::get('Invoices');
        $this->Users = TableRegistry::get('Users');
        $this->Payments = TableRegistry::get('Payments');
        $this->Districts = TableRegistry::get('Districts');
        $this->Attendees = TableRegistry::get('Attendees');
        $this->Sections = TableRegistry::get('Sections');
        $this->Scoutgroups = TableRegistry::get('Scoutgroups');


        $now = Time::now();
        $userId = $this->Auth->user('id');
        $user = $this->Users->get($userId);
        $section = $this->Sections->get($user->section_id);
        $group = $this->Scoutgroups->get($section->scoutgroup_id);
        $champD = $this->Districts->get($group->district_id);

        // Table Entities
        $applications = $this->Applications->find()->contain(['Users', 'Sections.Scoutgroups'])->where(['Scoutgroups.district_id' => $champD->id])->order(['Applications.modified' => 'DESC'])->limit(15);
        $events = $this->Events->find('upcoming')->contain(['Settings'])->order(['Events.start_date' => 'ASC']);
        $invoices = $this->Invoices->find()->contain(['Users', 'Applications', 'Applications.Sections.Scoutgroups'])->where(['Scoutgroups.district_id' => $champD->id])->order(['Invoices.modified' => 'DESC'])->limit(15);
        $users = $this->Users->find()->contain(['Roles', 'Sections.Scoutgroups'])->where(['Scoutgroups.district_id' => $champD->id])->order(['Users.modified' => 'DESC'])->limit(15);
        $payments = $this->Payments->find()->contain(['Invoices'])->order(['Payments.created' => 'DESC'])->limit(15);

        // Pass to View
        $this->set(compact('applications', 'events', 'invoices', 'users', 'payments'));

        /*// Counts of Entities
        $cntApplications = $this->Applications->find('all')->count('*');
        $cntEvents = $this->Events->find('all')->count('*');
        $cntInvoices = $this->Invoices->find('all')->count('*');
        $cntUsers = $usrs->find('all')->count('*');
        $cntPayments = $this->Payments->find('all')->count('*');

        // Pass to View
        $this->set(compact('cntApplications', 'cntEvents','cntInvoices','cntUsers','cntPayments','userId'));*/

        // Counts of Entities
        $cntApplications = $this->Applications->find('all')->contain(['Sections.Scoutgroups'])->where(['Scoutgroups.district_id' => $champD->district_id])->count('*');
        $cntEvents = $this->Events->find('all')->count('*');
        $cntInvoices = $this->Invoices->find('all')->contain(['Applications.Sections.Scoutgroups'])->where(['Scoutgroups.district_id' => $champD->district_id])->count('*');
        $cntUsers = $this->Users->find('all')->contain(['Sections.Scoutgroups'])->where(['Scoutgroups.district_id' => $champD->district_id])->count('*');
        $cntPayments = $this->Payments->find('all')->count('*');
        $cntAttendees = $this->Attendees->find('all')->contain(['Users.Sections.Scoutgroups'])->where(['Scoutgroups.district_id' => $champD->district_id])->count('*');

        // Pass to View
        $this->set(compact('cntApplications', 'cntEvents', 'cntInvoices', 'cntUsers', 'cntPayments', 'cntAttendees'));
    }
}
