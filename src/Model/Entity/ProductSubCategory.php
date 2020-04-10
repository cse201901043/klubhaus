<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProductSubCategory Entity
 *
 * @property int $sub_category_id
 * @property string $sub_category_name
 * @property string $sub_category_slug
 * @property string $sub_category_featured_image
 * @property string $sub_category_featured_product
 * @property int $sub_categories_category_id
 * @property string $created_by
 * @property string $updated_by
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime $updated_at
 * @property int $deleted
 *
 * @property \App\Model\Entity\ProductCategory $sub_categories_category
 * @property \App\Model\Entity\ShopProduct[] $shop_products
 */
class ProductSubCategory extends Entity
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
        'sub_category_name' => true,
        'sub_category_slug' => true,
        'sub_category_featured_image' => true,
        'sub_category_featured_product' => true,
        'sub_categories_category_id' => true,
        'created_by' => true,
        'updated_by' => true,
        'created_at' => true,
        'updated_at' => true,
        'deleted' => true,
        // 'sub_categories_category' => true,
        'shop_products' => true
    ];

    public function initialize(array $config)
    {
        $this->addBehavior('Timestam');

    }
}