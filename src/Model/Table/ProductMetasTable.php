<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProductMetas Model
 *
 * @property \App\Model\Table\MetaProductsTable|\Cake\ORM\Association\BelongsTo $MetaProducts
 *
 * @method \App\Model\Entity\ProductMeta get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProductMeta newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProductMeta[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProductMeta|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductMeta patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProductMeta[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProductMeta findOrCreate($search, callable $callback = null, $options = [])
 */
class ProductMetasTable extends Table
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

        $this->setTable('product_metas');
        $this->setDisplayField('product_meta_id');
        $this->setPrimaryKey('product_meta_id');

        $this->belongsTo('ShopProducts', [
            'foreignKey' => 'meta_product_id'
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
            ->integer('product_meta_id')
            ->allowEmpty('product_meta_id', 'create');

        $validator
            ->scalar('product_meta_field_name')
            ->maxLength('product_meta_field_name', 255)
            ->allowEmpty('product_meta_field_name');

        $validator
            ->scalar('product_meta_field_value')
            ->maxLength('product_meta_field_value', 4294967295)
            ->allowEmpty('product_meta_field_value');

        $validator
            ->scalar('created_by')
            ->maxLength('created_by', 255)
            ->allowEmpty('created_by');

        $validator
            ->scalar('updated_by')
            ->maxLength('updated_by', 255)
            ->allowEmpty('updated_by');

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
        $rules->add($rules->existsIn(['meta_product_id'], 'ShopProducts'));

        return $rules;
    }
}
