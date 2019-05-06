<?php
namespace App\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\EventsController Test Case
 */
class EventsControllerTest extends IntegrationTestCase
{

    public $fixtures = [
        'app.Sessions',
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

        $this->get('/events');

        $this->assertResponseOk();
    }

    /**
     * Test edit method
     *
     * @return void
     *
     * @throws
     */
    public function testBookGet()
    {
        $this->session([
           'Auth.User.id' => 1,
           'Auth.User.auth_role_id' => 2
        ]);

        $this->get('/events/book/2');

        $this->assertResponseOk();
    }

    /**
     * Test edit method
     *
     * @return void
     *
     * @throws
     */
    public function testBookPost()
    {
        $this->session([
            'Auth.User.id' => 1,
            'Auth.User.auth_role_id' => 2
        ]);

        $this->enableCsrfToken();
        $this->enableSecurityToken();

        $this->post('/events/book/2', ['section' => 1, 'non_section' => 2, 'leaders' => 3, 'booking_type' => 'list']);
        $this->assertRedirect(['controller' => 'Applications', 'action' => 'simple_book', 2, '?' => ['section' => 1, 'non_section' => 2, 'leaders' => 3]]);

        $this->post('/events/book/2', ['section' => 1, 'non_section' => 2, 'leaders' => 3, 'booking_type' => 'hold']);
        $this->assertRedirect(['controller' => 'Applications', 'action' => 'hold_book', 2, '?' => ['section' => 1, 'non_section' => 2, 'leaders' => 3]]);
    }

    /**
     * Test edit method
     *
     * @return void
     *
     * @throws
     */
    public function testBookPostLimits()
    {
        $this->session([
            'Auth.User.id' => 1,
            'Auth.User.auth_role_id' => 2
        ]);

        $events = $this->getTableLocator()->get('Events');

        /** @var \App\Model\Entity\Event $limitedEvent */

        $limitedEvent = $events->get(2, ['contain' => 'Prices']);

        $this->assertTrue($limitedEvent->max);
        $this->assertEquals(2, $limitedEvent->max_apps);
        foreach ($limitedEvent->prices as $price) {
            if ($price->item_type_id == 1) {
                $this->assertEquals(6, $price->max_number);
            }
        }

        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->enableRetainFlashMessages();

        $this->post('/events/book/2', ['section' => 7, 'non_section' => 2, 'leaders' => 3]);

        $this->assertNoRedirect();
        $this->assertFlashElement('Flash/error');
        $this->assertFlashMessage('The team size is limited, please select fewer attendees.');

        $this->post('/events/book/2', ['section' => 5, 'non_section' => 2, 'leaders' => 3, 'booking_type' => 'list']);
        $this->assertRedirect(['controller' => 'Applications', 'action' => 'simple_book', 2, '?' => ['section' => 5, 'non_section' => 2, 'leaders' => 3]]);

        $this->post('/events/book/2', ['section' => 5, 'non_section' => 2, 'leaders' => 3, 'booking_type' => 'hold']);
        $this->assertRedirect(['controller' => 'Applications', 'action' => 'hold_book', 2, '?' => ['section' => 5, 'non_section' => 2, 'leaders' => 3]]);

        $limitedEvent->set('max_apps', 1);
        $limitedEvent = $events->save($limitedEvent);

        $this->assertEquals(1, $limitedEvent->max_apps);

        $this->post('/events/book/2', ['section' => 5, 'non_section' => 2, 'leaders' => 3, 'booking_type' => 'list']);
        $this->assertNoRedirect();
        $this->assertFlashElement('Flash/error');
        $this->assertFlashMessage('Apologies this Event is Full.');
    }
}
