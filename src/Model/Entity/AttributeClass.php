<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AttributeClass Entity
 *
 * @property int $attribute_class_id
 * @property string $attribute_class_name
 * @property string $attribute_class_slug
 * @property string $created_by
 * @property string $updated_by
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime $updated_at
 * @property int $deleted
 */
class AttributeClass extends Entity
{

    protected $_accessible = [
        'attribute_class_name' => true,
        'attribute_class_slug' => true,
        'created_by' => true,
        'updated_by' => true,
        'created_at' => true,
        'updated_at' => true,
        'deleted' => true,

    ];

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    public function initialize(array $config)
    {
        $this->addBehavior('Timestam');

    }
}
