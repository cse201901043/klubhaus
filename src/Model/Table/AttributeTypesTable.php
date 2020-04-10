<?php

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AttributeTypes Model
 *
 * @property \App\Model\Table\AttributeTypesTable|\Cake\ORM\Association\BelongsTo $AttributeTypesClasses
 *
 * @method \App\Model\Entity\AttributeType get($primaryKey, $options = [])
 * @method \App\Model\Entity\AttributeType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AttributeType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AttributeType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AttributeType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AttributeType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AttributeType findOrCreate($search, callable $callback = null, $options = [])
 */
class AttributeTypesTable extends Table
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

        $this->setTable('attribute_types');
        $this->setDisplayField('attribute_type_id');
        $this->setPrimaryKey('attribute_type_id');

        $this->belongsTo('AttributeClasses', [
            'foreignKey' => 'attribute_types_class_id',
            'joinType' => 'INNER'
        ]);

        $this->hasMany('AttributeValues', [
            'foreignKey' => 'attribute_values_type_id',
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
            ->integer('attribute_type_id')
            ->allowEmpty('attribute_type_id', 'create');

        $validator
            ->scalar('attribute_type_name')
            ->maxLength('attribute_type_name', 255)
            ->requirePresence('attribute_type_name', 'create')
            ->notEmpty('attribute_type_name');

        $validator
            ->scalar('attribute_type_slug')
            ->maxLength('attribute_type_slug', 255)
            ->requirePresence('attribute_type_slug', 'create')
            ->notEmpty('attribute_type_slug');

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
        $rules->add($rules->existsIn(['attribute_types_class_id'], 'AttributeClasses'));

        return $rules;
    }
}
