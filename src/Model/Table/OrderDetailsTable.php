<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OrderDetails Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\OrdersTable|\Cake\ORM\Association\BelongsTo $Orders
 * @property \App\Model\Table\ShopProductsTable|\Cake\ORM\Association\BelongsTo $OrderProducts
 * @property \App\Model\Table\ProductStocksDetailsTable|\Cake\ORM\Association\BelongsTo $OrderProductStocks
 *
 * @method \App\Model\Entity\OrderDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\OrderDetail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\OrderDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OrderDetail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OrderDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OrderDetail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\OrderDetail findOrCreate($search, callable $callback = null, $options = [])
 */
class OrderDetailsTable extends Table
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

        $this->setTable('order_details');
        $this->setDisplayField('order_details_id');
        $this->setPrimaryKey('order_details_id');

        $this->belongsTo('Users', [
            'foreignKey' => 'order_user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Orders', [
            'foreignKey' => 'order_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ShopProducts', [
            'foreignKey' => 'order_product_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ProductStocksDetails', [
            'foreignKey' => 'order_product_stocks_id'
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
            ->integer('order_details_id')
            ->allowEmpty('order_details_id', 'create');

        $validator
            ->scalar('order_product_name')
            ->maxLength('order_product_name', 255)
            ->requirePresence('order_product_name', 'create')
            ->notEmpty('order_product_name');

        $validator
            ->integer('order_product_quantity')
            ->requirePresence('order_product_quantity', 'create')
            ->notEmpty('order_product_quantity');

        $validator
            ->numeric('order_product_unit_price')
            ->requirePresence('order_product_unit_price', 'create')
            ->notEmpty('order_product_unit_price');

        $validator
            ->numeric('order_product_total_price')
            ->requirePresence('order_product_total_price', 'create')
            ->notEmpty('order_product_total_price');

        $validator
            ->scalar('order_product_image')
            ->maxLength('order_product_image', 255)
            ->requirePresence('order_product_image', 'create')
            ->notEmpty('order_product_image');

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
        $rules->add($rules->existsIn(['order_id'], 'Orders'));
        $rules->add($rules->existsIn(['order_product_id'], 'ShopProducts'));
        $rules->add($rules->existsIn(['order_product_stocks_id'], 'ProductStocksDetails'));

        return $rules;
    }
}
