<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Community Model
 *
 * @method \App\Model\Entity\Community get($primaryKey, $options = [])
 * @method \App\Model\Entity\Community newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Community[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Community|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Community patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Community[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Community findOrCreate($search, callable $callback = null, $options = [])
 */
class CommunityTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('community');
        $this->setDisplayField('title');
        $this->setPrimaryKey('community_id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('community_id')
            ->allowEmpty('community_id', 'create');

        $validator
            ->scalar('title')
            ->maxLength('title', 255)
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->scalar('discription')
            ->requirePresence('discription', 'create')
            ->notEmpty('discription');

        $validator
            ->scalar('video_code')
            ->maxLength('video_code', 255)
            ->requirePresence('video_code', 'create')
            ->notEmpty('video_code');

        $validator
            ->scalar('created_at')
            ->maxLength('created_at', 255)
            ->requirePresence('created_at', 'create')
            ->notEmpty('created_at');

        $validator
            ->scalar('updated_at')
            ->maxLength('updated_at', 255)
            ->requirePresence('updated_at', 'create')
            ->notEmpty('updated_at');

        $validator
            ->requirePresence('created_by', 'create')
            ->notEmpty('created_by');

        $validator
            ->requirePresence('updated_by', 'create')
            ->notEmpty('updated_by');

        $validator
            ->integer('deleted')
            ->requirePresence('deleted', 'create')
            ->notEmpty('deleted');

        return $validator;
    }
}
