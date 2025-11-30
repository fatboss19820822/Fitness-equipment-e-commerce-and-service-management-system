<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RepairRequest Entity
 *
 * @property int $id
 * @property string $customer_name
 * @property string $email
 * @property string $address
 * @property string $suburb
 * @property string|null $brand_name
 * @property string|null $equipment_category
 * @property string|null $equipment_type
 * @property string $equipment
 * @property \Cake\I18n\DateTime|null $preferred_datetime
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 */
class RepairRequest extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'customer_name' => true,
        'email' => true,
        'address' => true,
        'suburb' => true,
        'brand_name' => true,
        'equipment_category' => true,
        'equipment_type' => true,
        'equipment' => true,
        'preferred_datetime' => true,
        'created' => true,
        'modified' => true,
    ];
}
