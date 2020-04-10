<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $id
 * @property string $name
 * @property string $name_slug
 * @property string $user_type
 * @property string $user_role
 * @property string $email
 * @property string $password
 * @property string $user_mobile
 * @property string $user_profile_image
 * @property int $login_status
 * @property string $status
 * @property string $remember_token
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime $updated_at
 * @property int $deleted
 *
 * @property \App\Model\Entity\AccessLog[] $access_logs
 */
class User extends Entity
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
        'name' => true,
        'name_slug' => true,
        'user_type' => true,
        'user_role' => true,
        'email' => true,
        'password' => true,
        'user_mobile' => true,
        'user_profile_image' => true,
        'login_status' => true,
        'status' => true,
        'remember_token' => true,
        'created_at' => true,
        'updated_at' => true,
        'deleted' => false,
        'access_logs' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    protected function _setPassword($password)
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher)->hash($password);
        }
    }

    public function initialize(array $config)
    {
        $this->addBehavior('Timestam');

    }
}
