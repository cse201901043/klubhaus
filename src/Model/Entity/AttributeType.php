<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AttributeType Entity
 *
 * @property int $attribute_type_id
 * @property string $attribute_type_name
 * @property string $attribute_type_slug
 * @property int $attribute_types_class_id
 * @property string $created_by
 * @property string $updated_by
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime $updated_at
 * @property int $deleted
 *
 * @property \App\Model\Entity\AttributeClass $attribute_types_class
 */
class AttributeType extends Entity
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
        'attribute_type_name' => true,
        'attribute_type_slug' => true,
        'attribute_types_class_id' => true,
        'created_by' => true,
        'updated_by' => true,
        'created_at' => true,
        'updated_at' => true,
        'deleted' => true,
        'attribute_types_class' => true
    ];

    public function initialize(array $config)
    {
        $this->addBehavior('Timestam');

    }
}
