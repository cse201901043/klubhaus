<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProductRating Entity
 *
 * @property int $ratings_id
 * @property int $ratings_product_id
 * @property float $rate_point
 * @property int $rate_user_id
 * @property string $created_by
 * @property string $updated_by
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime $updated_at
 * @property int $deleted
 *
 * @property \App\Model\Entity\RatingsProduct $ratings_product
 * @property \App\Model\Entity\RateUser $rate_user
 */
class ProductRating extends Entity
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
        'ratings_product_id' => true,
        'rate_point' => true,
        'rate_user_id' => true,
        'created_by' => true,
        'updated_by' => true,
        'created_at' => true,
        'updated_at' => true,
        'deleted' => true,
        'ratings_product' => true,
        'rate_user' => true
    ];
}
