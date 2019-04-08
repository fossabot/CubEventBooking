<?php
namespace App\Test\TestCase\Controller\SuperUser;

use App\Controller\SuperUser\TaskTypesController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\SuperUser\TaskTypesController Test Case
 */
class TaskTypesControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tasks',
        'app.task_types',
        'app.allergies',
        'app.application_statuses',
        'app.applications_attendees',
        'app.applications',
        'app.attendees',
        'app.attendees_allergies',
        'app.auth_roles',
        'app.champions',
        'app.discounts',
        'app.districts',
        'app.email_response_types',
        'app.email_responses',
        'app.email_sends',
        'app.event_statuses',
        'app.event_types',
        'app.events',
        'app.invoice_items',
        'app.invoices',
        'app.invoices_payments',
        'app.item_types',
        'app.logistic_items',
        'app.logistics',
        'app.notes',
        'app.notification_types',
        'app.notifications',
        'app.parameter_sets',
        'app.parameters',
        'app.params',
        'app.password_states',
        'app.payments',
        'app.prices',
        'app.reservation_statuses',
        'app.reservations',
        'app.roles',
        'app.scoutgroups',
        'app.section_types',
        'app.sections',
        'app.setting_types',
        'app.settings',
        'app.users',
    ];

    /**
     * Test index method
     *
     * @return void
     *
     * @throws
     */
    public function testIndex()
    {
        $this->session([
            'Auth.User.id' => 1,
            'Auth.User.auth_role_id' => 2
        ]);

        $this->get([
            'controller' => 'TaskTypes',
            'action' => 'index',
            'prefix' => 'super_user',
        ]);

        $this->assertResponseOk();
    }

    /**
     * Test view method
     *
     * @return void
     *
     * @throws
     */
    public function testView()
    {
        $this->session([
            'Auth.User.id' => 1,
            'Auth.User.auth_role_id' => 2
        ]);

        $this->get([
            'controller' => 'TaskTypes',
            'action' => 'view',
            'prefix' => 'super_user',
            1
        ]);

        $this->assertResponseOk();
    }

    /**
     * Test add method
     *
     * @return void
     *
     * @throws
     */
    public function testAdd()
    {
        $this->session([
            'Auth.User.id' => 1,
            'Auth.User.auth_role_id' => 2
        ]);

        $this->get([
            'controller' => 'TaskTypes',
            'action' => 'add',
            'prefix' => 'super_user',
        ]);

        $this->assertResponseOk();

        $this->enableSecurityToken();
        $this->enableCsrfToken();
        $this->enableRetainFlashMessages();

        $this->post([
            'controller' => 'TaskTypes',
            'action' => 'add',
            'prefix' => 'super_user',
        ], [
            'task_type' => 'Attendee Clean',
            'shared_type' => '0',
            'type_icon' => 'users',
            'type_code' => 'ATC',
            'task_requirement' => 'Please review the attendees you have in the system and remove their details if they are no longer in your section.',
        ]);

        $this->assertRedirect();
        $this->assertFlashMessageAt(0, 'The task type has been saved.');
    }

    /**
     * Test edit method
     *
     * @return void
     *
     * @throws
     */
    public function testEdit()
    {
        $this->session([
            'Auth.User.id' => 1,
            'Auth.User.auth_role_id' => 2
        ]);

        $this->get([
            'controller' => 'TaskTypes',
            'action' => 'edit',
            'prefix' => 'super_user',
            1
        ]);

        $this->assertResponseOk();

        $this->enableSecurityToken();
        $this->enableCsrfToken();
        $this->enableRetainFlashMessages();

        $this->post([
            'controller' => 'TaskTypes',
            'action' => 'edit',
            'prefix' => 'super_user',
            1
        ], [
            'task_type' => 'Attendee Clean',
            'shared_type' => '0',
            'type_icon' => 'users',
            'type_code' => 'ATC',
            'task_requirement' => 'Please review the attendees you have in the system and remove their details if they are no longer in your section.',
        ]);

        $this->assertRedirect();
        $this->assertFlashMessageAt(0, 'The task type has been saved.');
    }

    /**
     * Test delete method
     *
     * @return void
     *
     * @throws
     */
    public function testDelete()
    {
        $this->session([
            'Auth.User.id' => 1,
            'Auth.User.auth_role_id' => 2
        ]);

        $this->enableSecurityToken();
        $this->enableCsrfToken();
        $this->enableRetainFlashMessages();

        $this->post([
            'controller' => 'TaskTypes',
            'action' => 'delete',
            'prefix' => 'super_user',
            2
        ]);

        $this->assertRedirect();
        $this->assertFlashMessageAt(0, 'The task type has been deleted.');
    }
}