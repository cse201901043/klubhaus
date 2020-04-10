<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProductCategories Model
 *
 * @property \App\Model\Table\ShopProductsTable|\Cake\ORM\Association\HasMany $ShopProducts
 *
 * @method \App\Model\Entity\ProductCategory get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProductCategory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProductCategory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProductCategory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProductCategory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProductCategory findOrCreate($search, callable $callback = null, $options = [])
 */
class ProductCategoriesTable extends Table
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

        $this->setTable('product_categories');
        $this->setDisplayField('category_id');
        $this->setPrimaryKey('category_id');

        $this->hasMany('ProductSubCategories', [
            'foreignKey' => 'sub_categories_category_id',
            'joinType' => 'INNER',
            'conditions' => ['deleted' => 0]
        ]);

        $this->hasMany('ShopProducts', [
            'foreignKey' => 'product_category_id'
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
            ->integer('category_id')
            ->allowEmpty('category_id', 'create');

        $validator
            ->scalar('category_name')
            ->maxLength('category_name', 255)
            ->requirePresence('category_name', 'create')
            ->notEmpty('category_name');

        $validator
            ->scalar('category_slug')
            ->maxLength('category_slug', 255)
            ->requirePresence('category_slug', 'create')
            ->notEmpty('category_slug');

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

}
