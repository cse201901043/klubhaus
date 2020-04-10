<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProductDiscounts Model
 *
 * @property \App\Model\Table\DiscountTypesTable|\Cake\ORM\Association\BelongsTo $DiscountTypes
 *
 * @method \App\Model\Entity\ProductDiscount get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProductDiscount newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProductDiscount[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProductDiscount|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductDiscount patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProductDiscount[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProductDiscount findOrCreate($search, callable $callback = null, $options = [])
 */
class ProductDiscountsTable extends Table
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

        $this->setTable('product_discounts');
        $this->setDisplayField('product_discount_id');
        $this->setPrimaryKey('product_discount_id');

        $this->belongsTo('DiscountTypes', [
            'foreignKey' => 'discount_type_id',
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
            ->integer('product_discount_id')
            ->allowEmpty('product_discount_id', 'create');

        $validator
            ->scalar('discount_type')
            ->maxLength('discount_type', 255)
            ->requirePresence('discount_type', 'create')
            ->notEmpty('discount_type');

        $validator
            ->scalar('discount_rate')
            ->maxLength('discount_rate', 255)
            ->requirePresence('discount_rate', 'create')
            ->notEmpty('discount_rate');

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
        $rules->add($rules->existsIn(['discount_type_id'], 'DiscountTypes'));

        return $rules;
    }
}
