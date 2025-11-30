<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * InstallEquipmentRequest Entity
 *
 * @property int $id
 * @property string $full_name
 * @property string|null $company_name
 * @property string $email
 * @property string $address
 * @property string $brand_name
 * @property string $equipment_category
 * @property string $equipment_type
 * @property \Cake\I18n\DateTime $preferred_datetime
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 */
class InstallEquipmentRequest extends Entity
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
        'full_name' => true,
        'company_name' => true,
        'email' => true,
        'address' => true,
        'brand_name' => true,
        'equipment_category' => true,
        'equipment_type' => true,
        'preferred_datetime' => true,
        'created' => true,
        'modified' => true,
    ];
}
