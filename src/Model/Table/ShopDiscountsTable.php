<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ShopDiscounts Model
 *
 * @method \App\Model\Entity\ShopDiscount get($primaryKey, $options = [])
 * @method \App\Model\Entity\ShopDiscount newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ShopDiscount[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ShopDiscount|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ShopDiscount patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ShopDiscount[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ShopDiscount findOrCreate($search, callable $callback = null, $options = [])
 */
class ShopDiscountsTable extends Table
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

        $this->setTable('shop_discounts');
        $this->setDisplayField('shop_discount_id');
        $this->setPrimaryKey('shop_discount_id');
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
            ->integer('shop_discount_id')
            ->allowEmpty('shop_discount_id', 'create');

        $validator
            ->scalar('shop_discount_name')
            ->maxLength('shop_discount_name', 255)
            ->requirePresence('shop_discount_name', 'create')
            ->notEmpty('shop_discount_name');

        $validator
            ->scalar('shop_discount_slug')
            ->maxLength('shop_discount_slug', 255)
            ->requirePresence('shop_discount_slug', 'create')
            ->notEmpty('shop_discount_slug');

        $validator
            ->scalar('shop_discount_code')
            ->maxLength('shop_discount_code', 255)
            ->requirePresence('shop_discount_code', 'create')
            ->notEmpty('shop_discount_code');

        $validator
            ->scalar('shop_discount_rate')
            ->maxLength('shop_discount_rate', 255)
            ->requirePresence('shop_discount_rate', 'create')
            ->notEmpty('shop_discount_rate');

        $validator
            ->date('shop_discount_from')
            ->requirePresence('shop_discount_from', 'create')
            ->notEmpty('shop_discount_from');

        $validator
            ->date('shop_discount_to')
            ->requirePresence('shop_discount_to', 'create')
            ->notEmpty('shop_discount_to');

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
            ->allowEmpty('deleted');

        return $validator;
    }
}
