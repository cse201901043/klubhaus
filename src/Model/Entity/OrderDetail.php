<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OrderDetail Entity
 *
 * @property int $order_details_id
 * @property int $order_user_id
 * @property int $order_id
 * @property int $order_product_id
 * @property string $order_product_stocks_id
 * @property string $order_product_name
 * @property int $order_product_quantity
 * @property float $order_product_unit_price
 * @property float $order_product_total_price
 * @property string $order_product_image
 * @property string $created_by
 * @property string $updated_by
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime $updated_at
 * @property int $deleted
 *
 * @property \App\Model\Entity\User $order_user
 * @property \App\Model\Entity\Order $order
 * @property \App\Model\Entity\ShopProduct $order_product
 * @property \App\Model\Entity\ProductStocksDetail $order_product_stock
 */
class OrderDetail extends Entity
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
        'order_id' => true,
        'order_product_id' => true,
        'order_product_stocks_id' => true,
        'order_product_name' => true,
        'order_product_quantity' => true,
        'order_product_unit_price' => true,
        'order_product_total_price' => true,
        'order_product_image' => true,
        'created_by' => true,
        'updated_by' => true,
        'created_at' => true,
        'updated_at' => true,
        'deleted' => true,
        'user' => true,
        'order' => true,
//        'order_product' => true,
//        'order_product_stock' => true
    ];

    public function initialize(array $config)
    {
        $this->addBehavior('Timestam');

    }
}
