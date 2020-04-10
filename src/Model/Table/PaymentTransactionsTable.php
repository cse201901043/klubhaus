<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PaymentTransactions Model
 *
 * @property \App\Model\Table\PaymentTransactionsTable|\Cake\ORM\Association\BelongsTo $PaymentTransactions
 * @property \App\Model\Table\OrdersTable|\Cake\ORM\Association\BelongsTo $PaymentOrders
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $PaymentUsers
 * @property \App\Model\Table\PaymentTransactionsTable|\Cake\ORM\Association\HasMany
 *
 * @method \App\Model\Entity\PaymentTransaction get($primaryKey, $options = [])
 * @method \App\Model\Entity\PaymentTransaction newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PaymentTransaction[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PaymentTransaction|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PaymentTransaction patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PaymentTransaction[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PaymentTransaction findOrCreate($search, callable $callback = null, $options = [])
 */
class PaymentTransactionsTable extends Table
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

        $this->setTable('payment_transactions');
        $this->setDisplayField('payment_id');
        $this->setPrimaryKey('payment_id');

        $this->belongsTo('PaymentTransactions', [
            'foreignKey' => 'payment_transaction_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Orders', [
            'foreignKey' => 'payment_order_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'payment_user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('PaymentTransactions', [
            'foreignKey' => 'payment_transaction_id'
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
            ->integer('payment_id')
            ->allowEmpty('payment_id', 'create');

        $validator
            ->scalar('payment_purpose')
            ->maxLength('payment_purpose', 255)
            ->requirePresence('payment_purpose', 'create')
            ->notEmpty('payment_purpose');

        $validator
            ->numeric('payment_tax_amount')
            ->allowEmpty('payment_tax_amount');

        $validator
            ->numeric('payment_amount')
            ->requirePresence('payment_amount', 'create')
            ->notEmpty('payment_amount');

        $validator
            ->scalar('payment_status')
            ->maxLength('payment_status', 255)
            ->requirePresence('payment_status', 'create')
            ->notEmpty('payment_status');

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
        $rules->add($rules->existsIn(['payment_transaction_id'], 'PaymentTransactions'));
        $rules->add($rules->existsIn(['payment_order_id'], 'Orders'));
        $rules->add($rules->existsIn(['payment_user_id'], 'Users'));

        return $rules;
    }
}
