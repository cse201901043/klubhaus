<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AttributeClasses Model
 *
 * @method \App\Model\Entity\AttributeClass get($primaryKey, $options = [])
 * @method \App\Model\Entity\AttributeClass newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AttributeClass[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AttributeClass|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AttributeClass patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AttributeClass[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AttributeClass findOrCreate($search, callable $callback = null, $options = [])
 */
class AttributeClassesTable extends Table
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

        $this->setTable('attribute_classes');
        $this->setDisplayField('attribute_class_id');
        $this->setPrimaryKey('attribute_class_id');

        $this->hasMany('AttributeTypes', [
            'foreignKey' => 'attribute_types_class_id',
            'joinType' => 'INNER'
        ]);

        $this->hasMany('AttributeValues', [
            'foreignKey' => 'attribute_values_class_id',
            'joinType' => 'INNER'
        ]);

        $this->hasMany('ProductStocksDetails', [
            'foreignKey' => 'stocks_attribute_class_id',
            'joinType' => 'INNER'
        ]);

        // $this->belongsTo('AttributeTypes');

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
            ->integer('attribute_class_id')
            ->allowEmpty('attribute_class_id', 'create');

        $validator
            ->scalar('attribute_class_name')
            ->maxLength('attribute_class_name', 255)
            ->requirePresence('attribute_class_name', 'create')
            ->notEmpty('attribute_class_name');

        $validator
            ->scalar('attribute_class_slug')
            ->maxLength('attribute_class_slug', 255)
            ->requirePresence('attribute_class_slug', 'create')
            ->notEmpty('attribute_class_slug');

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
