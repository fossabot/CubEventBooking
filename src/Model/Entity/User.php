<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity.
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'role_id' => true,
        'scoutgroup_id' => true,
        'admin' => true,
        'firstname' => true,
        'lastname' => true,
        'email' => true,
        'password' => true,
        'phone' => true,
        'address_1' => true,
        'address_2' => true,
        'city' => true,
        'county' => true,
        'postcode' => true,
        'section' => true,
        'username' => true,
        'role' => true,
        'scoutgroup' => true,
        'applications' => true,
        'attendees' => true,
    ];
}
