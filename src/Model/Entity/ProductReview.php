<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProductReview Entity
 *
 * @property int $product_review_id
 * @property int $reviews_product_id
 * @property string $review_description
 * @property int $review_user_id
 * @property string $created_by
 * @property string $updated_by
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime $updated_at
 * @property int $deleted
 *
 * @property \App\Model\Entity\ReviewsProduct $reviews_product
 * @property \App\Model\Entity\ReviewUser $review_user
 */
class ProductReview extends Entity
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
        'reviews_product_id' => true,
        'review_description' => true,
        'review_user_id' => true,
        'created_by' => true,
        'updated_by' => true,
        'created_at' => true,
        'updated_at' => true,
        'deleted' => true,
        'reviews_product' => true,
        'review_user' => true
    ];
}
