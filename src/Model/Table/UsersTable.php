<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Users Model
 *
 * @property \App\Model\Table\AccessLogsTable|\Cake\ORM\Association\HasMany $AccessLogs
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('AccessLogs', [
            'foreignKey' => 'user_id'
        ]);

        $this->hasMany('UserMetas', [
            'foreignKey' => 'meta_user_id',
            'joinType' => 'INNER'
        ]);
        $this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                    'created_at' => 'new',
                    'updated_at' => 'always',
                ],
            ]
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
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('name_slug')
            ->maxLength('name_slug', 255)
            ->requirePresence('name_slug', 'create')
            ->notEmpty('name_slug');

        $validator
            ->scalar('user_type')
            ->maxLength('user_type', 255)
            ->requirePresence('user_type', 'create')
            ->notEmpty('user_type');

        $validator
            ->scalar('user_role')
            ->maxLength('user_role', 512)
            ->requirePresence('user_role', 'create')
            ->notEmpty('user_role');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email')
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->scalar('user_mobile')
            ->maxLength('user_mobile', 255)
            ->requirePresence('user_mobile', 'create')
            ->notEmpty('user_mobile')
            ->add('user_mobile', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('user_profile_image')
            ->maxLength('user_profile_image', 255)
            ->requirePresence('user_profile_image', 'create')
            ->notEmpty('user_profile_image');

        $validator
            ->integer('login_status')
            ->requirePresence('login_status', 'create')
            ->notEmpty('login_status');

        $validator
            ->scalar('status')
            ->maxLength('status', 255)
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        $validator
            ->scalar('remember_token')
            ->maxLength('remember_token', 100)
            ->allowEmpty('remember_token');

        $validator
            ->dateTime('created_at')
            ->allowEmpty('created_at');

        $validator
            ->dateTime('updated_at')
            ->allowEmpty('updated_at');

        // $validator
        //     ->integer('deleted')
        //     ->requirePresence('deleted', 'create')
        //     ->notEmpty('deleted');

        return $validator;
    }

    public function getUser(\Cake\Datasource\EntityInterface $profile) {
        // Make sure here that all the required fields are actually present
        if (empty($profile->email)) {
            throw new \RuntimeException('Could not find email in social profile.');
        }

        // Check if user with same email exists. This avoids creating multiple
        // user accounts for different social identities of same user. You should
        // probably skip this check if your system doesn't enforce unique email
        // per user.
        $user = $this->find()
            ->where(['email' => $profile->email])
            ->first();

        if ($user) {
            return $user;
        }

        // Create new user account
        $user = $this->newEntity(['email' => $profile->email]);
        $user = $this->save($user);

        if (!$user) {
            throw new \RuntimeException('Unable to save new user');
        }

        return $user;
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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->isUnique(['user_mobile']));

        return $rules;
    }
}
