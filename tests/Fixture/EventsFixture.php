<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EventsFixture
 *
 */
class EventsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'name' => ['type' => 'string', 'length' => 18, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'full_name' => ['type' => 'string', 'length' => 255, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'live' => ['type' => 'boolean', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'new_apps' => ['type' => 'boolean', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'start' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null],
        'end' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null],
        'created' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'modified' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'deposit' => ['type' => 'boolean', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'deposit_date' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'deposit_value' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'deposit_inc_leaders' => ['type' => 'boolean', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'deposit_text' => ['type' => 'string', 'length' => 45, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'cubs' => ['type' => 'boolean', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'cubs_value' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'cubs_text' => ['type' => 'string', 'length' => 45, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'yls' => ['type' => 'boolean', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'yls_value' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'yls_text' => ['type' => 'string', 'length' => 45, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'leaders' => ['type' => 'boolean', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'leaders_value' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'leaders_text' => ['type' => 'string', 'length' => 45, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'logo' => ['type' => 'string', 'length' => 255, 'default' => '/Monkey.png', 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'address' => ['type' => 'string', 'length' => 45, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'city' => ['type' => 'string', 'length' => 45, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'county' => ['type' => 'string', 'length' => 45, 'default' => 'Hertfordshire', 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'postcode' => ['type' => 'string', 'length' => 45, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'invtext_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'legaltext_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'discount_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'intro_text' => ['type' => 'string', 'length' => 999, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'tagline_text' => ['type' => 'string', 'length' => 125, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'location' => ['type' => 'string', 'length' => 45, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'max' => ['type' => 'boolean', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'max_cubs' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'max_yls' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'max_leaders' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'allow_reductions' => ['type' => 'boolean', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'logo_ratio' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'invoices_locked' => ['type' => 'boolean', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'admin_firstname' => ['type' => 'string', 'length' => 45, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'admin_lastname' => ['type' => 'string', 'length' => 45, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'admin_email' => ['type' => 'string', 'length' => 255, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'admin_user_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'parent_applications' => ['type' => 'boolean', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'available_apps' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'available_cubs' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'deleted' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        '_indexes' => [
            'evnt_invtext_idx' => ['type' => 'index', 'columns' => ['invtext_id'], 'length' => []],
            'events_invtext_id' => ['type' => 'index', 'columns' => ['invtext_id'], 'length' => []],
            'evnt_legaltext_id_idx' => ['type' => 'index', 'columns' => ['legaltext_id'], 'length' => []],
            'events_legaltext_id' => ['type' => 'index', 'columns' => ['legaltext_id'], 'length' => []],
            'evnt_discount_idx' => ['type' => 'index', 'columns' => ['discount_id'], 'length' => []],
            'events_discount_id' => ['type' => 'index', 'columns' => ['discount_id'], 'length' => []],
            'evnt_admin_user_idx' => ['type' => 'index', 'columns' => ['admin_user_id'], 'length' => []],
            'events_admin_user_id' => ['type' => 'index', 'columns' => ['admin_user_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'events_discount_id' => ['type' => 'foreign', 'columns' => ['discount_id'], 'references' => ['discounts', 'id'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
            'events_invtext_id' => ['type' => 'foreign', 'columns' => ['invtext_id'], 'references' => ['settings', 'id'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
            'events_legaltext_id' => ['type' => 'foreign', 'columns' => ['legaltext_id'], 'references' => ['settings', 'id'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'name' => 'Lorem ipsum dolo',
            'full_name' => 'Lorem ipsum dolor sit amet',
            'live' => 1,
            'new_apps' => 1,
            'start' => 1481496282,
            'end' => 1481496282,
            'created' => 1481496282,
            'modified' => 1481496282,
            'deposit' => 1,
            'deposit_date' => 1481496282,
            'deposit_value' => 1,
            'deposit_inc_leaders' => 1,
            'deposit_text' => 'Lorem ipsum dolor sit amet',
            'cubs' => 1,
            'cubs_value' => 1,
            'cubs_text' => 'Lorem ipsum dolor sit amet',
            'yls' => 1,
            'yls_value' => 1,
            'yls_text' => 'Lorem ipsum dolor sit amet',
            'leaders' => 1,
            'leaders_value' => 1,
            'leaders_text' => 'Lorem ipsum dolor sit amet',
            'logo' => 'Lorem ipsum dolor sit amet',
            'address' => 'Lorem ipsum dolor sit amet',
            'city' => 'Lorem ipsum dolor sit amet',
            'county' => 'Lorem ipsum dolor sit amet',
            'postcode' => 'Lorem ipsum dolor sit amet',
            'invtext_id' => 1,
            'legaltext_id' => 1,
            'discount_id' => 1,
            'intro_text' => 'Lorem ipsum dolor sit amet',
            'tagline_text' => 'Lorem ipsum dolor sit amet',
            'location' => 'Lorem ipsum dolor sit amet',
            'max' => 1,
            'max_cubs' => 1,
            'max_yls' => 1,
            'max_leaders' => 1,
            'allow_reductions' => 1,
            'logo_ratio' => 1,
            'invoices_locked' => 1,
            'admin_firstname' => 'Lorem ipsum dolor sit amet',
            'admin_lastname' => 'Lorem ipsum dolor sit amet',
            'admin_email' => 'Lorem ipsum dolor sit amet',
            'admin_user_id' => 1,
            'parent_applications' => 1,
            'available_apps' => 1,
            'available_cubs' => 1,
            'deleted' => 1481496282
        ],
    ];
}
