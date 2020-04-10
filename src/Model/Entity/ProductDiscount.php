<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProductDiscount Entity
 *
 * @property int $product_discount_id
 * @property int $discount_type_id
 * @property string $discount_rate
 * @property string $created_by
 * @property string $updated_by
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime $updated_at
 * @property int $deleted
 *
 * @property \App\Model\Entity\DiscountType $discount_type
 */
class ProductDiscount extends Entity
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
        'discount_type' => true,
        'discount_type_id' => true,
        'discount_rate' => true,
        'created_by' => true,
        'updated_by' => true,
        'created_at' => true,
        'updated_at' => true,
        'deleted' => true
    ];
}
