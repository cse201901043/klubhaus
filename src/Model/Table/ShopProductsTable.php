<?php

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ShopProducts Model
 *
 * @property \App\Model\Table\ProductCategoriesTable|\Cake\ORM\Association\BelongsTo $ProductCategories
 * @property \App\Model\Table\ProductSubCategoriesTable|\Cake\ORM\Association\BelongsTo $ProductSubCategories
 * @property \App\Model\Table\ProductBrandsTable|\Cake\ORM\Association\BelongsTo $ProductBrands
 * @property \App\Model\Table\AttributeClassesTable|\Cake\ORM\Association\BelongsTo $ProductAttributeClasses
 *
 * @method \App\Model\Entity\ShopProduct get($primaryKey, $options = [])
 * @method \App\Model\Entity\ShopProduct newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ShopProduct[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ShopProduct|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ShopProduct patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ShopProduct[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ShopProduct findOrCreate($search, callable $callback = null, $options = [])
 */
class ShopProductsTable extends Table
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

        $this->setTable('shop_products');
        $this->setDisplayField('products_id');
        $this->setPrimaryKey('products_id');

        $this->belongsTo('ProductCategories', [
            'foreignKey' => 'product_category_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ProductSubCategories', [
            'foreignKey' => 'product_sub_category_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ProductBrands', [
            'foreignKey' => 'product_brand_id'
        ]);
        $this->belongsTo('AttributeClasses', [
            'foreignKey' => 'product_attribute_class_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('ProductMetas', [
            'foreignKey' => 'meta_product_id',
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
            ->integer('products_id')
            ->allowEmpty('products_id', 'create');

        $validator
            ->date('product_arrival_date')
            ->requirePresence('product_arrival_date', 'create')
            ->notEmpty('product_arrival_date');

        $validator
            ->scalar('product_sku')
            ->maxLength('product_sku', 255)
            ->allowEmpty('product_sku');

        $validator
            ->scalar('product_name')
            ->maxLength('product_name', 255)
            ->requirePresence('product_name', 'create')
            ->notEmpty('product_name');

        $validator
            ->scalar('product_name_slug')
            ->maxLength('product_name_slug', 255)
            ->requirePresence('product_name_slug', 'create')
            ->notEmpty('product_name_slug');

        $validator
            ->scalar('product_featured_image')
            ->maxLength('product_featured_image', 255)
            ->allowEmpty('product_featured_image');

        $validator
            ->scalar('product_short_description')
            ->maxLength('product_short_description', 255)
            ->allowEmpty('product_short_description');

        $validator
            ->numeric('product_buy_price')
            ->allowEmpty('product_buy_price');

        $validator
            ->numeric('product_unit_sale_price')
            ->allowEmpty('product_unit_sale_price');

        $validator
            ->numeric('product_dummy_price')
            ->allowEmpty('product_dummy_price');

        $validator
            ->integer('product_stock')
            ->allowEmpty('product_stock');

        $validator
            ->integer('product_sold')
            ->allowEmpty('product_sold');

        $validator
            ->scalar('product_sale_status')
            ->maxLength('product_sale_status', 255)
            ->requirePresence('product_sale_status', 'create')
            ->notEmpty('product_sale_status');

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
        $rules->add($rules->existsIn(['product_category_id'], 'ProductCategories'));
        $rules->add($rules->existsIn(['product_sub_category_id'], 'ProductSubCategories'));
        $rules->add($rules->existsIn(['product_brand_id'], 'ProductBrands'));
        $rules->add($rules->existsIn(['product_attribute_class_id'], 'AttributeClasses'));

        return $rules;
    }
}
