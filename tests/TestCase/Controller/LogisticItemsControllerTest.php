<?php
namespace App\Test\TestCase\Controller;

use App\Controller\LogisticItemsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Admin\LogisticItemsController Test Case
 */
class LogisticItemsControllerTest extends IntegrationTestCase
{

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
        'app.ParameterSets',
        'app.Parameters',
        'app.Params',
        'app.Logistics',
        'app.LogisticItems',
        'app.EmailSends',
        'app.Tokens',
        'app.EmailResponseTypes',
        'app.EmailResponses',
        'app.Champions',
        'app.Sessions',
    ];

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
