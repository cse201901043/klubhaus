<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Slider Entity
 *
 * @property int $slider_id
 * @property int $slider_subCategory_id
 * @property string $slider_title
 * @property string $slider_image
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime $updated_by
 * @property \Cake\I18n\FrozenTime $created_by
 * @property \Cake\I18n\FrozenTime $updated_at
 * @property int $deleted
 *
 * @property \App\Model\Entity\SliderSubCategory $slider_sub_category
 */
class Slider extends Entity
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
        'slider_subCategory_id' => true,
        'slider_title' => true,
        'slider_image' => true,
        'created_at' => true,
        'updated_by' => true,
        'created_by' => true,
        'updated_at' => true,
        'deleted' => true,
        'slider_sub_category' => true
    ];
}
