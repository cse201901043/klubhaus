<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProductMeta Entity
 *
 * @property int $product_meta_id
 * @property int $meta_product_id
 * @property string $product_meta_field_name
 * @property string $product_meta_field_value
 * @property string $created_by
 * @property string $updated_by
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime $updated_at
 * @property int $deleted
 *
 * @property \App\Model\Entity\MetaProduct $meta_product
 */
class ProductMeta extends Entity
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
        'meta_product_id' => true,
        'product_meta_field_name' => true,
        'product_meta_field_value' => true,
        'created_by' => true,
        'updated_by' => true,
        'created_at' => true,
        'updated_at' => true,
        'deleted' => true,
        'meta_product' => true
    ];

    public function initialize(array $config)
    {
        $this->addBehavior('Timestam');

    }
}
