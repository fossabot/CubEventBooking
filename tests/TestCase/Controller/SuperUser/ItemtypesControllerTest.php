<?php
namespace App\Test\TestCase\Controller\SuperUser;

use App\Controller\SuperUser\ItemTypesController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\SuperUser\ItemTypesController Test Case
 */
class ItemTypesControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Districts',
        'app.Scoutgroups',
        'app.SectionTypes',
        'app.Sections',
        'app.PasswordStates',
        'app.AuthRoles',
        'app.ItemTypes',
        'app.Roles',
        'app.Users',
        'app.NotificationTypes',
        'app.Notifications',
        'app.ApplicationStatuses',
        'app.SettingTypes',
        'app.Settings',
        'app.EventTypes',
        'app.EventStatuses',
        'app.Discounts',
        'app.Events',
        'app.Prices',
        'app.Applications',
        'app.TaskTypes',
        'app.Tasks',
        'app.Attendees',
        'app.ApplicationsAttendees',
        'app.Allergies',
        'app.AttendeesAllergies',
        'app.ReservationStatuses',
        'app.Reservations',
        'app.Invoices',
        'app.InvoiceItems',
        'app.Payments',
        'app.InvoicesPayments',
        'app.Notes',
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
