<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UserMetas Model
 *
 * @property \App\Model\Table\MetaUsersTable|\Cake\ORM\Association\BelongsTo $MetaUsers
 *
 * @method \App\Model\Entity\UserMeta get($primaryKey, $options = [])
 * @method \App\Model\Entity\UserMeta newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UserMeta[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UserMeta|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserMeta patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UserMeta[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UserMeta findOrCreate($search, callable $callback = null, $options = [])
 */
class UserMetasTable extends Table
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

        $this->setTable('user_metas');
        $this->setDisplayField('user_meta_id');
        $this->setPrimaryKey('user_meta_id');

        $this->belongsTo('Users', [
            'foreignKey' => 'meta_user_id',
            'joinType' => 'INNER'
        ]);
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
            ->integer('user_meta_id')
            ->allowEmpty('user_meta_id', 'create');

        $validator
            ->scalar('user_meta_field_name')
            ->maxLength('user_meta_field_name', 255)
            ->requirePresence('user_meta_field_name', 'create')
            ->notEmpty('user_meta_field_name');

        $validator
            ->scalar('user_meta_field_value')
            ->maxLength('user_meta_field_value', 255)
            ->requirePresence('user_meta_field_value', 'create')
            ->notEmpty('user_meta_field_value');

        $validator
            ->scalar('created_by')
            ->maxLength('created_by', 255)
            ->requirePresence('created_by', 'create')
            ->notEmpty('created_by');

        $validator
            ->scalar('updated_by')
            ->maxLength('updated_by', 255)
            ->requirePresence('updated_by', 'create')
            ->notEmpty('updated_by');

        $validator
            ->dateTime('created_at')
            ->allowEmpty('created_at');

        $validator
            ->dateTime('updated_at')
            ->allowEmpty('updated_at');

        $validator
            ->integer('deleted')
            ->requirePresence('deleted', 'create')
            ->notEmpty('deleted');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['meta_user_id'], 'Users'));

        return $rules;
    }
}
