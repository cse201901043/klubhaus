<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AccessLogs Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\MacsTable|\Cake\ORM\Association\BelongsTo $Macs
 *
 * @method \App\Model\Entity\AccessLog get($primaryKey, $options = [])
 * @method \App\Model\Entity\AccessLog newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AccessLog[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AccessLog|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AccessLog patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AccessLog[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AccessLog findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AccessLogsTable extends Table
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

        $this->setTable('access_logs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('ip_address')
            ->maxLength('ip_address', 200)
            ->allowEmpty('ip_address');

        $validator
            ->scalar('controller')
            ->maxLength('controller', 200)
            ->allowEmpty('controller');

        $validator
            ->scalar('action')
            ->maxLength('action', 200)
            ->allowEmpty('action');

        $validator
            ->scalar('prev_data')
            ->allowEmpty('prev_data');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
