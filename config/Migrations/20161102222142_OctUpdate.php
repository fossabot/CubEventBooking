<?php
use Migrations\AbstractMigration;

class OctUpdate extends AbstractMigration
{

    public function up()
    {

        $this->table('applications')
            ->dropForeignKey([], 'applications_event_id')
            ->dropForeignKey([], 'applications_scoutgroup_id')
            ->dropForeignKey([], 'applications_user_id')
            ->removeIndexByName('event_id')
            ->removeIndexByName('scoutgroup_id')
            ->removeIndexByName('user_id')
            ->update();

        $this->table('applications')
            ->changeColumn('section', 'string')
            ->changeColumn('permitholder', 'string')
            ->changeColumn('eventname', 'string')
            ->update();
        $this->table('applications_attendees')
            ->dropForeignKey([], 'applications_attendees_application_id')
            ->dropForeignKey([], 'applications_attendees_attendee_id')
            ->removeIndexByName('application_id')
            ->removeIndexByName('attendee_id')
            ->removeIndexByName('attendee_id_2')
            ->update();
        $this->table('attendees')
            ->dropForeignKey([], 'attendees_role_id')
            ->dropForeignKey([], 'attendees_scoutgroup_id')
            ->dropForeignKey([], 'attendees_user_id')
            ->removeIndexByName('role_id')
            ->removeIndexByName('scoutgroup_id')
            ->removeIndexByName('user_id')
            ->update();

        $this->table('attendees')
            ->changeColumn('firstname', 'string')
            ->changeColumn('lastname', 'string')
            ->changeColumn('phone', 'string')
            ->changeColumn('phone2', 'string')
            ->changeColumn('address_1', 'string')
            ->changeColumn('address_2', 'string')
            ->changeColumn('city', 'string')
            ->changeColumn('county', 'string')
            ->changeColumn('postcode', 'string')
            ->update();
        $this->table('attendees_allergies')
            ->dropForeignKey([], 'attendees_allergies_allergy_id')
            ->dropForeignKey([], 'attendees_allergies_attendee_id')
            ->removeIndexByName('allergy_id')
            ->removeIndexByName('attendee_id')
            ->removeIndexByName('attendee_id_2')
            ->update();
        $this->table('champions')
            ->dropForeignKey([], 'champions_district_id')
            ->dropForeignKey([], 'champions_user_id')
            ->removeIndexByName('district_id')
            ->removeIndexByName('user_id')
            ->update();
        $this->table('discounts')
            ->removeIndexByName('code')
            ->update();
        $this->table('districts')
            ->removeIndexByName('district')
            ->update();

        $this->table('districts')
            ->changeColumn('district', 'string')
            ->changeColumn('county', 'string')
            ->update();
        $this->table('events')
            ->dropForeignKey([], 'events_discount_id')
            ->dropForeignKey([], 'events_invtext_id')
            ->dropForeignKey([], 'events_legaltext_id')
            ->removeIndexByName('admin_user_id')
            ->removeIndexByName('discount_id')
            ->removeIndexByName('invtext_id')
            ->removeIndexByName('legaltext_id')
            ->update();
        $this->table('invoice_items')
            ->dropForeignKey([], 'invoice_items_invoice_id')
            ->dropForeignKey([], 'invoice_items_itemtype_id')
            ->removeIndexByName('invoice_id')
            ->removeIndexByName('itemtype_id')
            ->update();
        $this->table('invoices')
            ->dropForeignKey([], 'invoices_application_id')
            ->dropForeignKey([], 'invoices_user_id')
            ->removeIndexByName('application_id')
            ->removeIndexByName('user_id')
            ->update();
        $this->table('invoices_payments')
            ->dropForeignKey([], 'invoices_payments_invoice_id')
            ->dropForeignKey([], 'invoices_payments_payment_id')
            ->removeIndexByName('invoice_id')
            ->removeIndexByName('payment_id')
            ->update();
        $this->table('logistic_items')
            ->dropForeignKey([], 'logistic_items_application_id')
            ->dropForeignKey([], 'logistic_items_logistic_id')
            ->dropForeignKey([], 'logistic_items_param_id')
            ->removeIndexByName('application_id')
            ->removeIndexByName('logistic_id')
            ->removeIndexByName('param_id')
            ->update();
        $this->table('logistics')
            ->dropForeignKey([], 'logistics_event_id')
            ->dropForeignKey([], 'logistics_parameter_id')
            ->removeIndexByName('event_id')
            ->removeIndexByName('parameter_id')
            ->update();
        $this->table('notes')
            ->dropForeignKey([], 'notes_application_id')
            ->dropForeignKey([], 'notes_invoice_id')
            ->dropForeignKey([], 'notes_user_id')
            ->removeIndexByName('application_id')
            ->removeIndexByName('invoice_id')
            ->removeIndexByName('user_id')
            ->update();
        $this->table('notifications')
            ->dropForeignKey([], 'notifications_notificationtype_id')
            ->dropForeignKey([], 'notifications_user_id')
            ->removeIndexByName('notificationtype_id')
            ->removeIndexByName('user_id')
            ->update();
        $this->table('parameters')
            ->dropForeignKey([], 'parameters_set_id')
            ->removeIndexByName('set_id')
            ->update();

        $this->table('parameters')
            ->changeColumn('id', 'integer')
            ->update();
        $this->table('params')
            ->dropForeignKey([], 'params_parameter_id')
            ->removeIndexByName('parameter_id')
            ->update();

        $this->table('params')
            ->changeColumn('id', 'integer')
            ->update();
        $this->table('payments')
            ->dropForeignKey([], 'payments_user_id')
            ->removeIndexByName('user_id')
            ->update();
        $this->table('scoutgroups')
            ->dropForeignKey([], 'scoutgroups_district_id')
            ->removeIndexByName('scoutgroup')
            ->removeIndexByName('district_id')
            ->update();
        $this->table('settings')
            ->dropForeignKey([], 'settings_settingtype_id')
            ->removeIndexByName('settingtype_id')
            ->update();
        $this->table('users')
            ->dropForeignKey([], 'users_role_id')
            ->dropForeignKey([], 'users_scoutgroup_id')
            ->removeIndexByName('username')
            ->removeIndexByName('role_id')
            ->removeIndexByName('scoutgroup_id')
            ->update();

        $this->table('users')
            ->changeColumn('authrole', 'string')
            ->changeColumn('firstname', 'string')
            ->changeColumn('lastname', 'string')
            ->changeColumn('email', 'string')
            ->changeColumn('password', 'string')
            ->changeColumn('phone', 'string')
            ->changeColumn('address_1', 'string')
            ->changeColumn('address_2', 'string')
            ->changeColumn('city', 'string')
            ->changeColumn('county', 'string')
            ->changeColumn('postcode', 'string')
            ->changeColumn('section', 'string')
            ->changeColumn('username', 'string')
            ->changeColumn('osm_secret', 'string')
            ->changeColumn('reset', 'string')
            ->update();

        $this->table('itemtypes')
            ->changeColumn('id', 'integer')
            ->changeColumn('minor', 'boolean')
            ->update();

        $this->table('parameter_sets')
            ->changeColumn('id', 'integer')
            ->update();

        $this->table('applications')
            ->addColumn('deleted', 'datetime', [
                'default' => null,
                'length' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'event_id',
                ],
                [
                    'name' => 'apps_event_idx',
                ]
            )
            ->addIndex(
                [
                    'scoutgroup_id',
                ],
                [
                    'name' => 'apps_scoutgroup_idx',
                ]
            )
            ->addIndex(
                [
                    'user_id',
                ],
                [
                    'name' => 'apps_user_idx',
                ]
            )
            ->update();

        $this->table('applications_attendees')
            ->addIndex(
                [
                    'attendee_id',
                    'application_id',
                ],
                [
                    'name' => 'apat_atts_x_apps_idx',
                ]
            )
            ->update();

        $this->table('attendees')
            ->addColumn('osm_sync_date', 'datetime', [
                'default' => null,
                'length' => null,
                'null' => true,
            ])
            ->addColumn('user_attendee', 'boolean', [
                'default' => null,
                'length' => null,
                'null' => true,
            ])
            ->addColumn('deleted', 'datetime', [
                'default' => null,
                'length' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'role_id',
                ],
                [
                    'name' => 'role_idx',
                ]
            )
            ->addIndex(
                [
                    'scoutgroup_id',
                ],
                [
                    'name' => 'atts_scoutgroup_id',
                ]
            )
            ->addIndex(
                [
                    'user_id',
                ],
                [
                    'name' => 'user_idx',
                ]
            )
            ->update();

        $this->table('attendees_allergies')
            ->addIndex(
                [
                    'attendee_id',
                    'allergy_id',
                ],
                [
                    'name' => 'atal_alle_x_atts_idx',
                ]
            )
            ->update();

        $this->table('champions')
            ->addColumn('deleted', 'datetime', [
                'default' => null,
                'length' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'user_id',
                ],
                [
                    'name' => 'chmp_user_idx',
                ]
            )
            ->addIndex(
                [
                    'district_id',
                ],
                [
                    'name' => 'chmp_dist_idx',
                ]
            )
            ->update();

        $this->table('districts')
            ->addColumn('deleted', 'datetime', [
                'default' => null,
                'length' => null,
                'null' => true,
            ])
            ->update();

        $this->table('events')
            ->addColumn('deleted', 'datetime', [
                'default' => null,
                'length' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'admin_user_id',
                ],
                [
                    'name' => 'evnt_admin_user_idx',
                ]
            )
            ->addIndex(
                [
                    'discount_id',
                ],
                [
                    'name' => 'evnt_discount_idx',
                ]
            )
            ->addIndex(
                [
                    'invtext_id',
                ],
                [
                    'name' => 'evnt_invtext_idx',
                ]
            )
            ->addIndex(
                [
                    'legaltext_id',
                ],
                [
                    'name' => 'evnt_legaltext_id_idx',
                ]
            )
            ->update();

        $this->table('invoice_items')
            ->addIndex(
                [
                    'invoice_id',
                ],
                [
                    'name' => 'item_Invoice_idx',
                ]
            )
            ->addIndex(
                [
                    'itemtype_id',
                ],
                [
                    'name' => 'item_itemtype_idx',
                ]
            )
            ->update();

        $this->table('invoices')
            ->addColumn('deleted', 'datetime', [
                'default' => null,
                'length' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'application_id',
                ],
                [
                    'name' => 'invs_application_idx',
                ]
            )
            ->addIndex(
                [
                    'user_id',
                ],
                [
                    'name' => 'invs_user_idx',
                ]
            )
            ->update();

        $this->table('invoices_payments')
            ->addIndex(
                [
                    'invoice_id',
                ],
                [
                    'name' => 'inpy_invoice_idx',
                ]
            )
            ->update();

        $this->table('logistic_items')
            ->addColumn('deleted', 'datetime', [
                'default' => null,
                'length' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'application_id',
                ],
                [
                    'name' => 'lgit_application_idx',
                ]
            )
            ->addIndex(
                [
                    'logistic_id',
                ],
                [
                    'name' => 'lgit_logistic_idx',
                ]
            )
            ->addIndex(
                [
                    'param_id',
                ],
                [
                    'name' => 'lgit_param_idx',
                ]
            )
            ->update();

        $this->table('logistics')
            ->addColumn('deleted', 'datetime', [
                'default' => null,
                'length' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'event_id',
                ],
                [
                    'name' => 'lsts_event_idx',
                ]
            )
            ->addIndex(
                [
                    'parameter_id',
                ],
                [
                    'name' => 'lsts_parameter_idx',
                ]
            )
            ->update();

        $this->table('notes')
            ->addColumn('deleted', 'datetime', [
                'default' => null,
                'length' => null,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'length' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'length' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'application_id',
                ],
                [
                    'name' => 'note_application_idx',
                ]
            )
            ->addIndex(
                [
                    'invoice_id',
                ],
                [
                    'name' => 'note_invoice_idx',
                ]
            )
            ->addIndex(
                [
                    'user_id',
                ],
                [
                    'name' => 'note_user_idx',
                ]
            )
            ->update();

        $this->table('notifications')
            ->addIndex(
                [
                    'user_id',
                ],
                [
                    'name' => 'noti_user_idx',
                ]
            )
            ->addIndex(
                [
                    'notificationtype_id',
                ],
                [
                    'name' => 'noti_notitype_idx',
                ]
            )
            ->update();

        $this->table('parameters')
            ->addColumn('deleted', 'datetime', [
                'default' => null,
                'length' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'set_id',
                ],
                [
                    'name' => 'para_set_idx',
                ]
            )
            ->update();

        $this->table('params')
            ->addIndex(
                [
                    'parameter_id',
                ],
                [
                    'name' => 'pram_parameter_idx',
                ]
            )
            ->update();

        $this->table('payments')
            ->addColumn('deleted', 'datetime', [
                'default' => null,
                'length' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'user_id',
                ],
                [
                    'name' => 'pays_user_idx',
                ]
            )
            ->update();

        $this->table('scoutgroups')
            ->addColumn('deleted', 'datetime', [
                'default' => null,
                'length' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'district_id',
                ],
                [
                    'name' => 'grps_district_idx',
                ]
            )
            ->update();

        $this->table('settings')
            ->addIndex(
                [
                    'settingtype_id',
                ],
                [
                    'name' => 'seti_settingtype_idx',
                ]
            )
            ->update();

        $this->table('users')
            ->addColumn('validated', 'boolean', [
                'default' => null,
                'length' => null,
                'null' => true,
            ])
            ->addColumn('deleted', 'datetime', [
                'default' => null,
                'length' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'role_id',
                ],
                [
                    'name' => 'user_role_idx',
                ]
            )
            ->addIndex(
                [
                    'scoutgroup_id',
                ],
                [
                    'name' => 'user_scoutgroup_idx',
                ]
            )
            ->update();

        $this->table('itemtypes')
            ->addColumn('cancelled', 'boolean', [
                'default' => null,
                'length' => null,
                'null' => true,
            ])
            ->update();

        $this->table('parameter_sets')
            ->addColumn('deleted', 'datetime', [
                'default' => null,
                'length' => null,
                'null' => true,
            ])
            ->update();

        $this->table('roles')
            ->addColumn('automated', 'boolean', [
                'default' => null,
                'length' => null,
                'null' => true,
            ])
            ->addColumn('deleted', 'datetime', [
                'default' => null,
                'length' => null,
                'null' => true,
            ])
            ->update();

        $this->table('applications')
            ->addForeignKey(
                'event_id',
                'events',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'scoutgroup_id',
                'scoutgroups',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'user_id',
                'users',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('applications_attendees')
            ->addForeignKey(
                'application_id',
                'applications',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->addForeignKey(
                'attendee_id',
                'attendees',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('attendees')
            ->addForeignKey(
                'role_id',
                'roles',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'scoutgroup_id',
                'scoutgroups',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'user_id',
                'users',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('attendees_allergies')
            ->addForeignKey(
                'allergy_id',
                'allergies',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'attendee_id',
                'attendees',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('champions')
            ->addForeignKey(
                'user_id',
                'users',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'district_id',
                'districts',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('events')
            ->addForeignKey(
                'discount_id',
                'discounts',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'invtext_id',
                'settings',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'legaltext_id',
                'settings',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('invoice_items')
            ->addForeignKey(
                'invoice_id',
                'invoices',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->addForeignKey(
                'itemtype_id',
                'itemtypes',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('invoices')
            ->addForeignKey(
                'application_id',
                'applications',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'user_id',
                'users',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('invoices_payments')
            ->addForeignKey(
                'invoice_id',
                'invoices',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'payment_id',
                'payments',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->update();

        $this->table('logistic_items')
            ->addForeignKey(
                'application_id',
                'applications',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->addForeignKey(
                'logistic_id',
                'logistics',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->addForeignKey(
                'param_id',
                'params',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->update();

        $this->table('logistics')
            ->addForeignKey(
                'event_id',
                'events',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->addForeignKey(
                'parameter_id',
                'parameters',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->update();

        $this->table('notes')
            ->addForeignKey(
                'application_id',
                'applications',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->addForeignKey(
                'invoice_id',
                'invoices',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->addForeignKey(
                'user_id',
                'users',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->update();

        $this->table('notifications')
            ->addForeignKey(
                'user_id',
                'users',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->addForeignKey(
                'notificationtype_id',
                'notificationtypes',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->update();

        $this->table('parameters')
            ->addForeignKey(
                'set_id',
                'parameter_sets',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('params')
            ->addForeignKey(
                'parameter_id',
                'parameters',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->update();

        $this->table('payments')
            ->addForeignKey(
                'user_id',
                'users',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('scoutgroups')
            ->addForeignKey(
                'district_id',
                'districts',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('settings')
            ->addForeignKey(
                'settingtype_id',
                'settingtypes',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('users')
            ->addForeignKey(
                'role_id',
                'roles',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'scoutgroup_id',
                'scoutgroups',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();
    }

    public function down()
    {
        $this->table('applications')
            ->dropForeignKey(
                'event_id'
            )
            ->dropForeignKey(
                'scoutgroup_id'
            )
            ->dropForeignKey(
                'user_id'
            );

        $this->table('applications_attendees')
            ->dropForeignKey(
                'application_id'
            )
            ->dropForeignKey(
                'attendee_id'
            );

        $this->table('attendees')
            ->dropForeignKey(
                'role_id'
            )
            ->dropForeignKey(
                'scoutgroup_id'
            )
            ->dropForeignKey(
                'user_id'
            );

        $this->table('attendees_allergies')
            ->dropForeignKey(
                'allergy_id'
            )
            ->dropForeignKey(
                'attendee_id'
            );

        $this->table('champions')
            ->dropForeignKey(
                'user_id'
            )
            ->dropForeignKey(
                'district_id'
            );

        $this->table('events')
            ->dropForeignKey(
                'discount_id'
            )
            ->dropForeignKey(
                'invtext_id'
            )
            ->dropForeignKey(
                'legaltext_id'
            );

        $this->table('invoice_items')
            ->dropForeignKey(
                'invoice_id'
            )
            ->dropForeignKey(
                'itemtype_id'
            );

        $this->table('invoices')
            ->dropForeignKey(
                'application_id'
            )
            ->dropForeignKey(
                'user_id'
            );

        $this->table('invoices_payments')
            ->dropForeignKey(
                'invoice_id'
            )
            ->dropForeignKey(
                'payment_id'
            )
            ->dropForeignKey(
                [
                    'payment_id',
                    'invoice_id',
                ]
            );

        $this->table('logistic_items')
            ->dropForeignKey(
                'application_id'
            )
            ->dropForeignKey(
                'logistic_id'
            )
            ->dropForeignKey(
                'param_id'
            );

        $this->table('logistics')
            ->dropForeignKey(
                'event_id'
            )
            ->dropForeignKey(
                'parameter_id'
            );

        $this->table('notes')
            ->dropForeignKey(
                'application_id'
            )
            ->dropForeignKey(
                'invoice_id'
            )
            ->dropForeignKey(
                'user_id'
            );

        $this->table('notifications')
            ->dropForeignKey(
                'user_id'
            )
            ->dropForeignKey(
                'notificationtype_id'
            );

        $this->table('parameters')
            ->dropForeignKey(
                'set_id'
            );

        $this->table('params')
            ->dropForeignKey(
                'parameter_id'
            );

        $this->table('payments')
            ->dropForeignKey(
                'user_id'
            );

        $this->table('scoutgroups')
            ->dropForeignKey(
                'district_id'
            );

        $this->table('settings')
            ->dropForeignKey(
                'settingtype_id'
            );

        $this->table('users')
            ->dropForeignKey(
                'role_id'
            )
            ->dropForeignKey(
                'scoutgroup_id'
            );

        $this->table('allergies')
            ->changeColumn('allergy', 'string', [
                'default' => null,
                'length' => 255,
                'null' => false,
            ])
            ->changeColumn('description', 'string', [
                'default' => null,
                'length' => 999,
                'null' => true,
            ])
            ->update();

        $this->table('applications')
            ->removeIndexByName('applications_event_idx')
            ->removeIndexByName('scoutgroup_id_idx')
            ->removeIndexByName('user_id_idx')
            ->update();

        $this->table('applications')
            ->changeColumn('section', 'string', [
                'default' => 'Cubs',
                'length' => 10,
                'null' => true,
            ])
            ->changeColumn('permitholder', 'string', [
                'default' => null,
                'length' => 255,
                'null' => true,
            ])
            ->changeColumn('eventname', 'string', [
                'default' => null,
                'length' => 255,
                'null' => false,
            ])
            ->removeColumn('deleted')
            ->addIndex(
                [
                    'event_id',
                ],
                [
                    'name' => 'event_id',
                ]
            )
            ->addIndex(
                [
                    'scoutgroup_id',
                ],
                [
                    'name' => 'apps_scoutgroup_id',
                ]
            )
            ->addIndex(
                [
                    'user_id',
                ],
                [
                    'name' => 'user_id',
                ]
            )
            ->update();

        $this->table('applications_attendees')
            ->removeIndexByName('attendee_idx')
            ->update();

        $this->table('applications_attendees')
            ->addIndex(
                [
                    'application_id',
                ],
                [
                    'name' => 'application_id',
                ]
            )
            ->addIndex(
                [
                    'attendee_id',
                ],
                [
                    'name' => 'attendee_id',
                ]
            )
            ->addIndex(
                [
                    'attendee_id',
                    'application_id',
                ],
                [
                    'name' => 'attendee_id_2',
                ]
            )
            ->update();

        $this->table('attendees')
            ->removeIndexByName('role_idx')
            ->removeIndexByName('scoutgroup_id_idx')
            ->removeIndexByName('user_idx')
            ->update();

        $this->table('attendees')
            ->changeColumn('firstname', 'string', [
                'default' => null,
                'length' => 255,
                'null' => false,
            ])
            ->changeColumn('lastname', 'string', [
                'default' => null,
                'length' => 255,
                'null' => false,
            ])
            ->changeColumn('phone', 'string', [
                'default' => null,
                'length' => 12,
                'null' => true,
            ])
            ->changeColumn('phone2', 'string', [
                'default' => null,
                'length' => 12,
                'null' => true,
            ])
            ->changeColumn('address_1', 'string', [
                'default' => null,
                'length' => 255,
                'null' => true,
            ])
            ->changeColumn('address_2', 'string', [
                'default' => null,
                'length' => 255,
                'null' => true,
            ])
            ->changeColumn('city', 'string', [
                'default' => null,
                'length' => 125,
                'null' => true,
            ])
            ->changeColumn('county', 'string', [
                'default' => null,
                'length' => 125,
                'null' => true,
            ])
            ->changeColumn('postcode', 'string', [
                'default' => null,
                'length' => 8,
                'null' => true,
            ])
            ->removeColumn('osm_sync_date')
            ->removeColumn('user_attendee')
            ->removeColumn('deleted')
            ->addIndex(
                [
                    'role_id',
                ],
                [
                    'name' => 'role_id',
                ]
            )
            ->addIndex(
                [
                    'scoutgroup_id',
                ],
                [
                    'name' => 'users_scoutgroup_id',
                ]
            )
            ->addIndex(
                [
                    'user_id',
                ],
                [
                    'name' => 'user_id',
                ]
            )
            ->update();

        $this->table('attendees_allergies')
            ->removeIndexByName('allergy_idx')
            ->removeIndexByName('allergy_key')
            ->update();

        $this->table('attendees_allergies')
            ->addIndex(
                [
                    'allergy_id',
                ],
                [
                    'name' => 'allergy_id',
                ]
            )
            ->addIndex(
                [
                    'attendee_id',
                ],
                [
                    'name' => 'attendee_id',
                ]
            )
            ->addIndex(
                [
                    'attendee_id',
                    'allergy_id',
                ],
                [
                    'name' => 'attendee_id_2',
                ]
            )
            ->update();

        $this->table('champions')
            ->removeIndexByName('champ_user_id_idx')
            ->removeIndexByName('district_id_idx')
            ->update();

        $this->table('champions')
            ->removeColumn('deleted')
            ->addIndex(
                [
                    'district_id',
                ],
                [
                    'name' => 'district_id',
                ]
            )
            ->addIndex(
                [
                    'user_id',
                ],
                [
                    'name' => 'user_id',
                ]
            )
            ->update();

        $this->table('discounts')
            ->addIndex(
                [
                    'code',
                ],
                [
                    'name' => 'code',
                    'unique' => true,
                ]
            )
            ->update();

        $this->table('districts')
            ->changeColumn('district', 'string', [
                'default' => null,
                'length' => 255,
                'null' => false,
            ])
            ->changeColumn('county', 'string', [
                'default' => 'Hertfordshire',
                'length' => 255,
                'null' => true,
            ])
            ->removeColumn('deleted')
            ->addIndex(
                [
                    'district',
                ],
                [
                    'name' => 'district',
                    'unique' => true,
                ]
            )
            ->update();

        $this->table('events')
            ->removeIndexByName('admin_user_id_idx')
            ->removeIndexByName('discount_id_idx')
            ->removeIndexByName('invtext_id_idx')
            ->removeIndexByName('legaltext_id_idx')
            ->update();

        $this->table('events')
            ->removeColumn('deleted')
            ->addIndex(
                [
                    'admin_user_id',
                ],
                [
                    'name' => 'admin_user_id',
                ]
            )
            ->addIndex(
                [
                    'discount_id',
                ],
                [
                    'name' => 'discount_id',
                ]
            )
            ->addIndex(
                [
                    'invtext_id',
                ],
                [
                    'name' => 'invtext_id',
                ]
            )
            ->addIndex(
                [
                    'legaltext_id',
                ],
                [
                    'name' => 'legaltext_id',
                ]
            )
            ->update();

        $this->table('invoice_items')
            ->removeIndexByName('InvoiceID_idx')
            ->removeIndexByName('itemtype_id_idx')
            ->update();

        $this->table('invoice_items')
            ->addIndex(
                [
                    'invoice_id',
                ],
                [
                    'name' => 'invoice_id',
                ]
            )
            ->addIndex(
                [
                    'itemtype_id',
                ],
                [
                    'name' => 'itemtype_id',
                ]
            )
            ->update();

        $this->table('invoices')
            ->removeIndexByName('invoices_applications_idx')
            ->removeIndexByName('user_id_idx')
            ->update();

        $this->table('invoices')
            ->removeColumn('deleted')
            ->addIndex(
                [
                    'application_id',
                ],
                [
                    'name' => 'application_id',
                ]
            )
            ->addIndex(
                [
                    'user_id',
                ],
                [
                    'name' => 'user_id',
                ]
            )
            ->update();

        $this->table('invoices_payments')
            ->removeIndexByName('invoice_id_idx')
            ->update();

        $this->table('invoices_payments')
            ->addIndex(
                [
                    'invoice_id',
                ],
                [
                    'name' => 'invoice_id',
                ]
            )
            ->addIndex(
                [
                    'payment_id',
                ],
                [
                    'name' => 'payment_id',
                ]
            )
            ->update();

        $this->table('logistic_items')
            ->removeIndexByName('FK_logisticitems_applications_idx')
            ->removeIndexByName('FK_logisticitems_logistics_idx')
            ->removeIndexByName('FK_logisticitems_params_idx')
            ->update();

        $this->table('logistic_items')
            ->removeColumn('deleted')
            ->addIndex(
                [
                    'application_id',
                ],
                [
                    'name' => 'application_id',
                ]
            )
            ->addIndex(
                [
                    'logistic_id',
                ],
                [
                    'name' => 'logistic_id',
                ]
            )
            ->addIndex(
                [
                    'param_id',
                ],
                [
                    'name' => 'param_id',
                ]
            )
            ->update();

        $this->table('logistics')
            ->removeIndexByName('FK_logistics_events_idx')
            ->removeIndexByName('parameters_logistics_idx')
            ->update();

        $this->table('logistics')
            ->removeColumn('deleted')
            ->addIndex(
                [
                    'event_id',
                ],
                [
                    'name' => 'event_id',
                ]
            )
            ->addIndex(
                [
                    'parameter_id',
                ],
                [
                    'name' => 'parameter_id',
                ]
            )
            ->update();

        $this->table('notes')
            ->removeIndexByName('FK_Notes_Apps_idx')
            ->removeIndexByName('FK_Notes_Invs_idx')
            ->removeIndexByName('FK_Notes_Users_idx')
            ->update();

        $this->table('notes')
            ->removeColumn('deleted')
            ->removeColumn('created')
            ->removeColumn('modified')
            ->addIndex(
                [
                    'application_id',
                ],
                [
                    'name' => 'application_id',
                ]
            )
            ->addIndex(
                [
                    'invoice_id',
                ],
                [
                    'name' => 'invoice_id',
                ]
            )
            ->addIndex(
                [
                    'user_id',
                ],
                [
                    'name' => 'user_id',
                ]
            )
            ->update();

        $this->table('notifications')
            ->removeIndexByName('notification_user_idx')
            ->removeIndexByName('notificationtypes_idx')
            ->update();

        $this->table('notifications')
            ->addIndex(
                [
                    'notificationtype_id',
                ],
                [
                    'name' => 'notificationtype_id',
                ]
            )
            ->addIndex(
                [
                    'user_id',
                ],
                [
                    'name' => 'user_id',
                ]
            )
            ->update();

        $this->table('parameters')
            ->removeIndexByName('FK_parameters_sets_idx')
            ->update();

        $this->table('parameters')
            ->changeColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'length' => 11,
                'null' => false,
            ])
            ->removeColumn('deleted')
            ->addIndex(
                [
                    'set_id',
                ],
                [
                    'name' => 'set_id',
                ]
            )
            ->update();

        $this->table('params')
            ->removeIndexByName('parameter_id_idx')
            ->update();

        $this->table('params')
            ->changeColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'length' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'parameter_id',
                ],
                [
                    'name' => 'parameter_id',
                ]
            )
            ->update();

        $this->table('payments')
            ->removeIndexByName('user_id_idx')
            ->update();

        $this->table('payments')
            ->removeColumn('deleted')
            ->addIndex(
                [
                    'user_id',
                ],
                [
                    'name' => 'user_id',
                ]
            )
            ->update();

        $this->table('scoutgroups')
            ->removeIndexByName('district_id_idx')
            ->update();

        $this->table('scoutgroups')
            ->removeColumn('deleted')
            ->addIndex(
                [
                    'scoutgroup',
                ],
                [
                    'name' => 'scoutgroup',
                    'unique' => true,
                ]
            )
            ->addIndex(
                [
                    'district_id',
                ],
                [
                    'name' => 'district_id',
                ]
            )
            ->update();

        $this->table('settings')
            ->removeIndexByName('settingtype_id_idx')
            ->update();

        $this->table('settings')
            ->addIndex(
                [
                    'settingtype_id',
                ],
                [
                    'name' => 'settingtype_id',
                ]
            )
            ->update();

        $this->table('users')
            ->removeIndexByName('role_id_idx')
            ->removeIndexByName('scoutgroup_id_idx')
            ->update();

        $this->table('users')
            ->changeColumn('authrole', 'string', [
                'default' => null,
                'length' => 20,
                'null' => true,
            ])
            ->changeColumn('firstname', 'string', [
                'default' => null,
                'length' => 125,
                'null' => false,
            ])
            ->changeColumn('lastname', 'string', [
                'default' => null,
                'length' => 125,
                'null' => false,
            ])
            ->changeColumn('email', 'string', [
                'default' => null,
                'length' => 255,
                'null' => false,
            ])
            ->changeColumn('password', 'string', [
                'default' => null,
                'length' => 255,
                'null' => false,
            ])
            ->changeColumn('phone', 'string', [
                'default' => null,
                'length' => 12,
                'null' => false,
            ])
            ->changeColumn('address_1', 'string', [
                'default' => null,
                'length' => 255,
                'null' => false,
            ])
            ->changeColumn('address_2', 'string', [
                'default' => null,
                'length' => 255,
                'null' => true,
            ])
            ->changeColumn('city', 'string', [
                'default' => null,
                'length' => 125,
                'null' => false,
            ])
            ->changeColumn('county', 'string', [
                'default' => null,
                'length' => 125,
                'null' => false,
            ])
            ->changeColumn('postcode', 'string', [
                'default' => null,
                'length' => 8,
                'null' => false,
            ])
            ->changeColumn('section', 'string', [
                'default' => 'Cubs',
                'length' => 10,
                'null' => true,
            ])
            ->changeColumn('username', 'string', [
                'default' => null,
                'length' => 45,
                'null' => false,
            ])
            ->changeColumn('osm_secret', 'string', [
                'default' => null,
                'length' => 999,
                'null' => true,
            ])
            ->changeColumn('reset', 'string', [
                'default' => null,
                'length' => 999,
                'null' => true,
            ])
            ->removeColumn('validated')
            ->removeColumn('deleted')
            ->addIndex(
                [
                    'username',
                ],
                [
                    'name' => 'username',
                    'unique' => true,
                ]
            )
            ->addIndex(
                [
                    'role_id',
                ],
                [
                    'name' => 'role_id',
                ]
            )
            ->addIndex(
                [
                    'scoutgroup_id',
                ],
                [
                    'name' => 'users_scoutgroup_id',
                ]
            )
            ->update();

        $this->table('itemtypes')
            ->changeColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'length' => 11,
                'null' => false,
            ])
            ->changeColumn('minor', 'integer', [
                'default' => null,
                'length' => 11,
                'null' => true,
            ])
            ->removeColumn('cancelled')
            ->update();

        $this->table('parameter_sets')
            ->changeColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'length' => 11,
                'null' => false,
            ])
            ->removeColumn('deleted')
            ->update();

        $this->table('roles')
            ->removeColumn('automated')
            ->removeColumn('deleted')
            ->update();

        $this->table('applications')
            ->addForeignKey(
                'event_id',
                'events',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'scoutgroup_id',
                'scoutgroups',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'user_id',
                'users',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('applications_attendees')
            ->addForeignKey(
                'application_id',
                'applications',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->addForeignKey(
                'attendee_id',
                'attendees',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('attendees')
            ->addForeignKey(
                'role_id',
                'roles',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'scoutgroup_id',
                'scoutgroups',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'user_id',
                'users',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('attendees_allergies')
            ->addForeignKey(
                'allergy_id',
                'allergies',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'attendee_id',
                'attendees',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('champions')
            ->addForeignKey(
                'district_id',
                'districts',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'user_id',
                'users',
                'id'
            )
            ->update();

        $this->table('events')
            ->addForeignKey(
                'discount_id',
                'discounts',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'invtext_id',
                'settings',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'legaltext_id',
                'settings',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('invoice_items')
            ->addForeignKey(
                'invoice_id',
                'invoices',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->addForeignKey(
                'itemtype_id',
                'itemtypes',
                'id'
            )
            ->update();

        $this->table('invoices')
            ->addForeignKey(
                'application_id',
                'applications',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'user_id',
                'users',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('invoices_payments')
            ->addForeignKey(
                [
                    'invoice_id',
                    'payment_id',
                ],
                '',
                '',
                [
                    'update' => '',
                    'delete' => ''
                ]
            )
            ->addForeignKey(
                'invoice_id',
                'invoices',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'payment_id',
                'payments',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->update();

        $this->table('logistic_items')
            ->addForeignKey(
                'application_id',
                'applications',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->addForeignKey(
                'logistic_id',
                'logistics',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->addForeignKey(
                'param_id',
                'params',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->update();

        $this->table('logistics')
            ->addForeignKey(
                'event_id',
                'events',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->addForeignKey(
                'parameter_id',
                'parameters',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->update();

        $this->table('notes')
            ->addForeignKey(
                'application_id',
                'applications',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->addForeignKey(
                'invoice_id',
                'invoices',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->addForeignKey(
                'user_id',
                'users',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'SETNULL'
                ]
            )
            ->update();

        $this->table('notifications')
            ->addForeignKey(
                'notificationtype_id',
                'notificationtypes',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->addForeignKey(
                'user_id',
                'users',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->update();

        $this->table('parameters')
            ->addForeignKey(
                'set_id',
                'parameter_sets',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('params')
            ->addForeignKey(
                'parameter_id',
                'parameters',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->update();

        $this->table('payments')
            ->addForeignKey(
                'user_id',
                'users',
                'id'
            )
            ->update();

        $this->table('scoutgroups')
            ->addForeignKey(
                'district_id',
                'districts',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('settings')
            ->addForeignKey(
                'settingtype_id',
                'settingtypes',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('users')
            ->addForeignKey(
                'role_id',
                'roles',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'scoutgroup_id',
                'scoutgroups',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();
    }
}

