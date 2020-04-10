<?php

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProductStocksDetails Model
 *
 * @property \App\Model\Table\StocksProductsTable|\Cake\ORM\Association\BelongsTo $StocksProducts
 * @property \App\Model\Table\StocksAttributeClassesTable|\Cake\ORM\Association\BelongsTo $StocksAttributeClasses
 * @property \App\Model\Table\StocksAttributeTypesTable|\Cake\ORM\Association\BelongsTo $StocksAttributeTypes
 * @property \App\Model\Table\StocksAttributeFieldsTable|\Cake\ORM\Association\BelongsTo $StocksAttributeFields
 *
 * @method \App\Model\Entity\ProductStocksDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProductStocksDetail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProductStocksDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProductStocksDetail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductStocksDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProductStocksDetail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProductStocksDetail findOrCreate($search, callable $callback = null, $options = [])
 */
class ProductStocksDetailsTable extends Table
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

        $this->setTable('product_stocks_details');
        $this->setDisplayField('product_stocks_id');
        $this->setPrimaryKey('product_stocks_id');

        $this->belongsTo('ShopProducts', [
            'foreignKey' => 'stocks_product_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('AttributeClasses', [
            'foreignKey' => 'stocks_attribute_class_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('AttributeTypes', [
            'foreignKey' => 'stocks_attribute_type_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('AttributeValues', [
            'foreignKey' => 'stocks_attribute_field_id',
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
            ->integer('product_stocks_id')
            ->allowEmpty('product_stocks_id', 'create');

        $validator
            ->integer('product_attribute_stock')
            ->requirePresence('product_attribute_stock', 'create')
            ->notEmpty('product_attribute_stock');

        $validator
            ->integer('product_attribute_sold')
            ->requirePresence('product_attribute_sold', 'create')
            ->notEmpty('product_attribute_sold');

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
        $rules->add($rules->existsIn(['product_id'], 'ShopProducts'));
        $rules->add($rules->existsIn(['attribute_class_id'], 'AttributeClasses'));
        $rules->add($rules->existsIn(['attribute_type_id'], 'AttributeTypes'));
        $rules->add($rules->existsIn(['attribute_field_id'], 'AttributeValues'));

        return $rules;
    }
}
