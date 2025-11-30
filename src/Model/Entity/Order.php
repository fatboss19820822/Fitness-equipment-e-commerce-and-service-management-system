<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Order Entity
 *
 * @property int $id
 * @property string $total_amount
 * @property string|null $status
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\OrderItem[] $order_items
 */
class Order extends Entity
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
        'total_amount' => true,
        'status' => true,
        'customer_name' => true,
        'email' => true,
        'address' => true,
        'delivery_method' => true,
        'shipping_cost' => true,
        'created' => true,
        'modified' => true,
        'order_items' => true,
    ];

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->notEmptyString('customer_name', 'Full Name is required')
            ->email('email', false, 'A valid email address is required')
            ->notEmptyString('email', 'Email is required')
            ->notEmptyString('address', 'Address is required')
            ->notEmptyString('delivery_method', 'Delivery method is required')
            ->add('delivery_method', 'inList', [
                'rule' => ['inList', ['Free Shipping', 'Express', 'Pickup']],
                'message' => 'Please choose a valid delivery method'
            ]);

        return $validator;
    }
}
