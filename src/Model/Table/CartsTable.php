<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Carts Model
 *
 * @property \App\Model\Table\ShopProductsTable|\Cake\ORM\Association\BelongsTo $CartProducts
 * @property \App\Model\Table\ProductStocksDetailsTable|\Cake\ORM\Association\BelongsTo $CartProductStocks
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $CartUsers
 *
 * @method \App\Model\Entity\Cart get($primaryKey, $options = [])
 * @method \App\Model\Entity\Cart newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Cart[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cart|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cart patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Cart[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cart findOrCreate($search, callable $callback = null, $options = [])
 */
class CartsTable extends Table
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

        $this->setTable('carts');
        $this->setDisplayField('cart_id');
        $this->setPrimaryKey('cart_id');

        $this->belongsTo('ShopProducts', [
            'foreignKey' => 'cart_product_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ProductStocksDetails', [
            'foreignKey' => 'cart_product_stocks_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'cart_user_id',
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
            ->integer('cart_id')
            ->allowEmpty('cart_id', 'create');

        $validator
            ->scalar('cart_product_name')
            ->maxLength('cart_product_name', 255)
            ->requirePresence('cart_product_name', 'create')
            ->notEmpty('cart_product_name');

        $validator
            ->integer('cart_product_quantity')
            ->requirePresence('cart_product_quantity', 'create')
            ->notEmpty('cart_product_quantity');

        $validator
            ->numeric('cart_product_unit_price')
            ->requirePresence('cart_product_unit_price', 'create')
            ->notEmpty('cart_product_unit_price');

        $validator
            ->numeric('cart_product_total_price')
            ->requirePresence('cart_product_total_price', 'create')
            ->notEmpty('cart_product_total_price');

        $validator
            ->scalar('cart_product_image')
            ->maxLength('cart_product_image', 255)
            ->requirePresence('cart_product_image', 'create')
            ->notEmpty('cart_product_image');

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
            ->integer('in_wishlist')
            ->requirePresence('in_wishlist', 'create')
            ->notEmpty('in_wishlist');

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
        $rules->add($rules->existsIn(['cart_product_id'], 'ShopProducts'));
        $rules->add($rules->existsIn(['cart_product_stocks_id'], 'ProductStocksDetails'));
        $rules->add($rules->existsIn(['cart_user_id'], 'Users'));

        return $rules;
    }
}
