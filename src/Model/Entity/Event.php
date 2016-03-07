<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Event Entity.
 *
 * @property int $id
 * @property string $name
 * @property string $full_name
 * @property bool $live
 * @property \Cake\I18n\Time $start
 * @property \Cake\I18n\Time $end
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property bool $deposit
 * @property \Cake\I18n\Time $deposit_date
 * @property float $deposit_value
 * @property bool $deposit_inc_leaders
 * @property string $deposit_text
 * @property bool $cubs
 * @property float $cubs_value
 * @property string $cubs_text
 * @property bool $yls
 * @property float $yls_value
 * @property string $yls_text
 * @property bool $leaders
 * @property float $leaders_value
 * @property string $leaders_text
 * @property string $logo
 * @property string $address
 * @property string $city
 * @property string $county
 * @property string $postcode
 * @property int $invtext_id
 * @property int $legaltext_id
 * @property int $discount_id
 * @property \App\Model\Entity\Discount $discount
 * @property string $intro_text
 * @property string $tagline_text
 * @property string $location
 * @property bool $max
 * @property int $max_cubs
 * @property int $max_yls
 * @property int $max_leaders
 * @property bool $allow_reductions
 * @property float $logo_ratio
 * @property \App\Model\Entity\Setting[] $settings
 * @property \App\Model\Entity\Application[] $applications
 */
class Event extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];

    protected function _getAltText()
    {
        return $this->_properties['name'] . ' logo';
    }

    protected function _getAdminFullName()
    {
        return $this->_properties['admin_firstname'] . ' ' . $this->_properties['admin_lastname'];
    }

    protected $_virtual = ['admin_full_name', 'alt_text'];
}