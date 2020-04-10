<?php

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AttributeValues Model
 *
 * @property \App\Model\Table\AttributeTypesTable|\Cake\ORM\Association\BelongsTo $AttributeValuesTypes
 * @property \App\Model\Table\AttributeClassesTable|\Cake\ORM\Association\BelongsTo $AttributeValuesClasses
 *
 * @method \App\Model\Entity\AttributeValue get($primaryKey, $options = [])
 * @method \App\Model\Entity\AttributeValue newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AttributeValue[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AttributeValue|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AttributeValue patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AttributeValue[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AttributeValue findOrCreate($search, callable $callback = null, $options = [])
 */
class AttributeValuesTable extends Table
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

        $this->setTable('attribute_values');
        $this->setDisplayField('attribute_field_id');
        $this->setPrimaryKey('attribute_field_id');

        $this->belongsTo('AttributeTypes', [
            'foreignKey' => 'attribute_values_type_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('AttributeClasses', [
            'foreignKey' => 'attribute_values_class_id',
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
            ->integer('attribute_field_id')
            ->allowEmpty('attribute_field_id', 'create');

        $validator
            ->scalar('attribute_field_value')
            ->maxLength('attribute_field_value', 255)
            ->requirePresence('attribute_field_value', 'create')
            ->notEmpty('attribute_field_value');

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
        $rules->add($rules->existsIn(['attribute_values_type_id'], 'AttributeTypes'));
        $rules->add($rules->existsIn(['attribute_values_class_id'], 'AttributeClasses'));

        return $rules;
    }
}
