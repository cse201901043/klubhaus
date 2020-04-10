<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Community Entity
 *
 * @property int $community_id
 * @property string $title
 * @property string $discription
 * @property string $video_code
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property int $deleted
 */
class Community extends Entity
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
        'title' => true,
        'discription' => true,
        'video_code' => true,
        'created_at' => true,
        'updated_at' => true,
        'created_by' => true,
        'updated_by' => true,
        'deleted' => true
    ];
}
