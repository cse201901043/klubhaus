<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cart Entity
 *
 * @property int $cart_id
 * @property int $cart_product_id
 * @property string $cart_product_stocks_id
 * @property int $cart_user_id
 * @property string $cart_product_name
 * @property int $cart_product_quantity
 * @property float $cart_product_unit_price
 * @property float $cart_product_total_price
 * @property string $cart_product_image
 * @property string $created_by
 * @property string $updated_by
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime $updated_at
 * @property int $in_wishlist
 * @property int $deleted
 *
 * @property \App\Model\Entity\ShopProduct $cart_product
 * @property \App\Model\Entity\ProductStocksDetails $cart_product_stock
 * @property \App\Model\Entity\User $cart_user
 */
class Cart extends Entity
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
        'cart_product_id' => true,
        'cart_product_stocks_id' => true,
        'cart_user_id' => true,
        'cart_product_name' => true,
        'cart_product_quantity' => true,
        'cart_product_unit_price' => true,
        'cart_product_total_price' => true,
        'cart_product_image' => true,
        'created_by' => true,
        'updated_by' => true,
        'created_at' => true,
        'updated_at' => true,
        'in_wishlist' => true,
        'deleted' => true,
        'cart_product' => true,
        'cart_product_stock' => true,
        'cart_user' => true
    ];
}
