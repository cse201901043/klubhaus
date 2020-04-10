<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Orders Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $OrderUsers
 * @property \App\Model\Table\PaymentTransactionsTable|\Cake\ORM\Association\BelongsTo $OrderPayments
 *
 * @method \App\Model\Entity\Order get($primaryKey, $options = [])
 * @method \App\Model\Entity\Order newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Order[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Order|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Order patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Order[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Order findOrCreate($search, callable $callback = null, $options = [])
 */
class OrdersTable extends Table
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

        $this->setTable('orders');
        $this->setDisplayField('order_id');
        $this->setPrimaryKey('order_id');

        $this->belongsTo('Users', [
            'foreignKey' => 'order_user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('PaymentTransactions', [
            'foreignKey' => 'order_payment_id'
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
            ->integer('order_id')
            ->allowEmpty('order_id', 'create');

        $validator
            ->scalar('order_payment_transaction')
            ->maxLength('order_payment_transaction', 255)
            ->allowEmpty('order_payment_transaction');

        $validator
            ->numeric('order_shipping_cost')
            ->allowEmpty('order_shipping_cost');

        $validator
            ->scalar('order_shipping_address')
            ->maxLength('order_shipping_address', 1000)
            ->requirePresence('order_shipping_address', 'create')
            ->notEmpty('order_shipping_address');

        $validator
            ->scalar('order_discount_type')
            ->allowEmpty('order_discount_type');

        $validator
            ->scalar('order_discount_code')
            ->maxLength('order_discount_code', 255)
            ->allowEmpty('order_discount_code');

        $validator
            ->numeric('order_discount_rate')
            ->allowEmpty('order_discount_rate');

        $validator
            ->numeric('order_amount')
            ->requirePresence('order_amount', 'create')
            ->notEmpty('order_amount');

        $validator
            ->numeric('order_deduct_amount')
            ->allowEmpty('order_deduct_amount');

        $validator
            ->numeric('order_tax_amount')
            ->allowEmpty('order_tax_amount');

        $validator
            ->numeric('order_grand_total')
            ->requirePresence('order_grand_total', 'create')
            ->notEmpty('order_grand_total');

        $validator
            ->scalar('order_payment_status')
            ->maxLength('order_payment_status', 255)
            ->requirePresence('order_payment_status', 'create')
            ->notEmpty('order_payment_status');

        $validator
            ->scalar('order_deliver_status')
            ->maxLength('order_deliver_status', 255)
            ->requirePresence('order_deliver_status', 'create')
            ->notEmpty('order_deliver_status');

        $validator
            ->scalar('order_status')
            ->maxLength('order_status', 255)
            ->requirePresence('order_status', 'create')
            ->notEmpty('order_status');

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
        $rules->add($rules->existsIn(['order_user_id'], 'Users'));
        $rules->add($rules->existsIn(['order_payment_id'], 'PaymentTransactions'));

        return $rules;
    }
}
