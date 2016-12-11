<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LogisticItemsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LogisticItemsTable Test Case
 */
class LogisticItemsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LogisticItemsTable
     */
    public $LogisticItems;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.logistic_items',
        'app.applications',
        'app.users',
        'app.roles',
        'app.attendees',
        'app.scoutgroups',
        'app.districts',
        'app.champions',
        'app.applications_attendees',
        'app.allergies',
        'app.attendees_allergies',
        'app.notes',
        'app.invoices',
        'app.invoice_items',
        'app.itemtypes',
        'app.payments',
        'app.invoices_payments',
        'app.notifications',
        'app.notificationtypes',
        'app.events',
        'app.settings',
        'app.settingtypes',
        'app.discounts',
        'app.logistics',
        'app.parameters',
        'app.parameter_sets',
        'app.params'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('LogisticItems') ? [] : ['className' => 'App\Model\Table\LogisticItemsTable'];
        $this->LogisticItems = TableRegistry::get('LogisticItems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->LogisticItems);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
