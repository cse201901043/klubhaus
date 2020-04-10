<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProductStocksDetail Entity
 *
 * @property int $product_stocks_id
 * @property int $stocks_product_id
 * @property int $stocks_attribute_class_id
 * @property int $stocks_attribute_type_id
 * @property int $stocks_attribute_field_id
 * @property int $product_attribute_stock
 * @property int $product_attribute_sold
 * @property string $created_by
 * @property string $updated_by
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime $updated_at
 * @property int $deleted
 *
 * @property \App\Model\Entity\StocksProduct $stocks_product
 * @property \App\Model\Entity\StocksAttributeClass $stocks_attribute_class
 * @property \App\Model\Entity\StocksAttributeType $stocks_attribute_type
 * @property \App\Model\Entity\StocksAttributeField $stocks_attribute_field
 */
class ProductStocksDetail extends Entity
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
        'stocks_product_id' => true,
        'stocks_attribute_class_id' => true,
        'stocks_attribute_type_id' => true,
        'stocks_attribute_field_id' => true,
        'product_attribute_stock' => true,
        'product_attribute_sold' => true,
        'created_by' => true,
        'updated_by' => true,
        'created_at' => true,
        'updated_at' => true,
        'deleted' => true,
        'stocks_product' => true,
        'stocks_attribute_class' => true,
        'stocks_attribute_type' => true,
        'stocks_attribute_field' => true
    ];

    public function initialize(array $config)
    {
        $this->addBehavior('Timestam');

    }
}
