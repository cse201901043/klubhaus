<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProductBrand Entity
 *
 * @property int $brand_id
 * @property string $brand_name
 * @property string $brand_slug
 * @property string $brand_image
 * @property string $brand_featured_product
 * @property string $created_by
 * @property string $updated_by
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime $updated_at
 * @property int $deleted
 *
 * @property \App\Model\Entity\ShopProduct[] $shop_products
 */
class ProductBrand extends Entity
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
        'brand_name' => true,
        'brand_slug' => true,
        'brand_image' => true,
        'brand_featured_product' => true,
        'created_by' => true,
        'updated_by' => true,
        'created_at' => true,
        'updated_at' => true,
        'deleted' => true,
        'shop_products' => true
    ];

    public function initialize(array $config)
    {
        $this->addBehavior('Timestam');

    }
}
