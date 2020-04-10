<?php

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProductSubCategories Model
 *
 * @property \App\Model\Table\ProductCategoriesTable|\Cake\ORM\Association\BelongsTo $SubCategoriesCategories
 * @property \App\Model\Table\ShopProductsTable|\Cake\ORM\Association\HasMany $ShopProducts
 *
 * @method \App\Model\Entity\ProductSubCategory get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProductSubCategory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProductSubCategory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProductSubCategory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductSubCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProductSubCategory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProductSubCategory findOrCreate($search, callable $callback = null, $options = [])
 */
class ProductSubCategoriesTable extends Table
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

        $this->setTable('product_sub_categories');
        $this->setDisplayField('sub_category_id');
        $this->setPrimaryKey('sub_category_id');

        $this->belongsTo('ProductCategories', [
            'foreignKey' => 'sub_categories_category_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('ShopProducts', [
            'foreignKey' => 'product_sub_category_id'
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
            ->integer('sub_category_id')
            ->allowEmpty('sub_category_id', 'create');

        $validator
            ->scalar('sub_category_name')
            ->maxLength('sub_category_name', 255)
            ->requirePresence('sub_category_name', 'create')
            ->notEmpty('sub_category_name');

        $validator
            ->scalar('sub_category_slug')
            ->maxLength('sub_category_slug', 255)
            ->requirePresence('sub_category_slug', 'create')
            ->notEmpty('sub_category_slug');

        $validator
            ->scalar('sub_category_featured_image')
            ->maxLength('sub_category_featured_image', 255)
            ->requirePresence('sub_category_featured_image', 'create')
            ->notEmpty('sub_category_featured_image');

        $validator
            ->scalar('sub_category_featured_product')
            ->maxLength('sub_category_featured_product', 255)
            ->requirePresence('sub_category_featured_product', 'create')
            ->notEmpty('sub_category_featured_product');

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
        $rules->add($rules->existsIn(['sub_categories_category_id'], 'ProductCategories'));

        return $rules;
    }
}