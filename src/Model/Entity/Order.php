<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Order Entity
 *
 * @property int $order_id
 * @property int $order_user_id
 * @property int $order_payment_id
 * @property string $order_payment_transaction
 * @property float $order_shipping_cost
 * @property string $order_shipping_address
 * @property string $order_discount_type
 * @property string $order_discount_code
 * @property float $order_discount_rate
 * @property float $order_amount
 * @property float $order_deduct_amount
 * @property float $order_tax_amount
 * @property float $order_grand_total
 * @property string $order_payment_status
 * @property string $order_deliver_status
 * @property string $order_status
 * @property string $created_by
 * @property string $updated_by
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime $updated_at
 * @property int $deleted
 *
 * @property \App\Model\Entity\User $order_user
 * @property \App\Model\Entity\PaymentTransaction $order_payment
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
     * @var array
     */
    protected $_accessible = [
        'order_user_id' => true,
        'order_payment_id' => true,
        'order_payment_transaction' => true,
        'order_shipping_cost' => true,
        'order_shipping_address' => true,
        'order_shipping_type' => true,
        'order_discount_type' => true,
        'order_discount_code' => true,
        'order_discount_rate' => true,
        'order_amount' => true,
        'order_deduct_amount' => true,
        'order_tax_amount' => true,
        'order_grand_total' => true,
        'order_payment_status' => true,
        'order_deliver_status' => true,
        'order_status' => true,
        'created_by' => true,
        'updated_by' => true,
        'created_at' => true,
        'updated_at' => true,
        'deleted' => true,
//        'order_user' => true,
//        'order_payment' => true
    ];

    public function initialize(array $config)
    {
        $this->addBehavior('Timestam');

    }
}
