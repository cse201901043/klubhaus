<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ShopProduct Entity
 *
 * @property int $products_id
 * @property \Cake\I18n\FrozenDate $product_arrival_date
 * @property string $product_sku
 * @property string $product_name
 * @property string $product_name_slug
 * @property string $product_featured_image
 * @property int $product_category_id
 * @property int $product_sub_category_id
 * @property int $product_brand_id
 * @property int $product_attribute_class_id
 * @property string $product_short_description
 * @property float $product_buy_price
 * @property float $product_unit_sale_price
 * @property float $product_dummy_price
 * @property int $product_stock
 * @property int $product_sold
 * @property string $product_sale_status
 * @property string $created_by
 * @property string $updated_by
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime $updated_at
 * @property int $deleted
 *
 * @property \App\Model\Entity\ProductCategory $product_category
 * @property \App\Model\Entity\ProductSubCategory $product_sub_category
 * @property \App\Model\Entity\ProductBrand $product_brand
 * @property \App\Model\Entity\AttributeClass $product_attribute_class
 */
class ShopProduct extends Entity
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
        'product_arrival_date' => true,
        'product_sku' => true,
        'product_name' => true,
        'product_name_slug' => true,
        'product_featured_image' => true,
        'product_category_id' => true,
        'product_sub_category_id' => true,
        'product_brand_id' => true,
        'product_attribute_class_id' => true,
        'product_short_description' => true,
        'product_buy_price' => true,
        'product_unit_sale_price' => true,
        'product_dummy_price' => true,
        'product_stock' => true,
        'product_sold' => true,
        'product_sale_status' => true,
        'created_by' => true,
        'updated_by' => true,
        'created_at' => true,
        'updated_at' => true,
        'deleted' => true,
        'product_category' => true,
        'product_sub_category' => true,
        'product_brand' => true,
        'product_attribute_class' => true
    ];

    public function initialize(array $config)
    {
        $this->addBehavior('Timestam');

    }
}
