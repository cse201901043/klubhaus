<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AccessLog Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $ip_address
 * @property string $controller
 * @property string $action
 * @property string $prev_data
 * @property string $mac_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Mac $mac
 */
class AccessLog extends Entity
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
        'user_id' => true,
        'ip_address' => true,
        'controller' => true,
        'action' => true,
        'prev_data' => true,
        'mac_id' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'mac' => true
    ];
}
