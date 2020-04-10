<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ShopDiscount Entity
 *
 * @property int $shop_discount_id
 * @property string $shop_discount_name
 * @property string $shop_discount_slug
 * @property string $shop_discount_code
 * @property string $shop_discount_rate
 * @property \Cake\I18n\FrozenDate $shop_discount_from
 * @property \Cake\I18n\FrozenDate $shop_discount_to
 * @property string $created_by
 * @property string $updated_by
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime $updated_at
 * @property int $deleted
 */
class ShopDiscount extends Entity
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
        'shop_discount_name' => true,
        'shop_discount_slug' => true,
        'shop_discount_code' => true,
        'shop_discount_rate' => true,
        'shop_discount_from' => true,
        'shop_discount_to' => true,
        'created_by' => true,
        'updated_by' => true,
        'created_at' => true,
        'updated_at' => true,
        'deleted' => true
    ];
}
