<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PaymentTransaction Entity
 *
 * @property int $payment_id
 * @property string $payment_transaction_id
 * @property int $payment_order_id
 * @property int $payment_user_id
 * @property string $payment_purpose
 * @property float $payment_tax_amount
 * @property float $payment_amount
 * @property string $payment_status
 * @property string $created_by
 * @property string $updated_by
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime $updated_at
 * @property int $deleted
 *
 * @property \App\Model\Entity\PaymentTransaction[] $payment_transactions
 * @property \App\Model\Entity\PaymentOrder $payment_order
 * @property \App\Model\Entity\PaymentUser $payment_user
 */
class PaymentTransaction extends Entity
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
        'payment_transaction_id' => true,
        'payment_order_id' => true,
        'payment_user_id' => true,
        'payment_purpose' => true,
        'payment_tax_amount' => true,
        'payment_amount' => true,
        'payment_status' => true,
        'created_by' => true,
        'updated_by' => true,
        'created_at' => true,
        'updated_at' => true,
        'deleted' => true,
        'payment_transactions' => true,
        'payment_order' => true,
        'payment_user' => true
    ];
}
