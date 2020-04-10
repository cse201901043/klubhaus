<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProductBrands Model
 *
 * @property \App\Model\Table\ShopProductsTable|\Cake\ORM\Association\HasMany $ShopProducts
 *
 * @method \App\Model\Entity\ProductBrand get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProductBrand newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProductBrand[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProductBrand|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductBrand patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProductBrand[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProductBrand findOrCreate($search, callable $callback = null, $options = [])
 */
class ProductBrandsTable extends Table
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

        $this->setTable('product_brands');
        $this->setDisplayField('brand_id');
        $this->setPrimaryKey('brand_id');

        $this->hasMany('ShopProducts', [
            'foreignKey' => 'product_brand_id'
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
            ->integer('brand_id')
            ->allowEmpty('brand_id', 'create');

        $validator
            ->scalar('brand_name')
            ->maxLength('brand_name', 255)
            ->requirePresence('brand_name', 'create')
            ->notEmpty('brand_name');

        $validator
            ->scalar('brand_slug')
            ->maxLength('brand_slug', 255)
            ->requirePresence('brand_slug', 'create')
            ->notEmpty('brand_slug');

        $validator
            ->scalar('brand_image')
            ->maxLength('brand_image', 255)
            ->requirePresence('brand_image', 'create')
            ->notEmpty('brand_image');

        $validator
            ->scalar('brand_featured_product')
            ->maxLength('brand_featured_product', 255)
            ->requirePresence('brand_featured_product', 'create')
            ->notEmpty('brand_featured_product');

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
