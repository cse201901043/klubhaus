<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Slider Model
 *
 * @property \App\Model\Table\SliderSubCategoriesTable|\Cake\ORM\Association\BelongsTo $SliderSubCategories
 *
 * @method \App\Model\Entity\Slider get($primaryKey, $options = [])
 * @method \App\Model\Entity\Slider newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Slider[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Slider|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Slider patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Slider[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Slider findOrCreate($search, callable $callback = null, $options = [])
 */
class SliderTable extends Table
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

        $this->setTable('slider');
        $this->setDisplayField('slider_id');
        $this->setPrimaryKey('slider_id');

        $this->belongsTo('SliderSubCategories', [
            'foreignKey' => 'slider_subCategory_id',
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
            ->integer('slider_id')
            ->allowEmpty('slider_id', 'create');

        $validator
            ->scalar('slider_title')
            ->maxLength('slider_title', 255)
            ->requirePresence('slider_title', 'create')
            ->notEmpty('slider_title');

        $validator
            ->scalar('slider_image')
            ->maxLength('slider_image', 255)
            ->requirePresence('slider_image', 'create')
            ->notEmpty('slider_image');

        $validator
            ->dateTime('created_at')
            ->requirePresence('created_at', 'create')
            ->notEmpty('created_at');

        $validator
            ->dateTime('updated_by')
            ->requirePresence('updated_by', 'create')
            ->notEmpty('updated_by');

        $validator
            ->dateTime('created_by')
            ->requirePresence('created_by', 'create')
            ->notEmpty('created_by');

        $validator
            ->dateTime('updated_at')
            ->requirePresence('updated_at', 'create')
            ->notEmpty('updated_at');

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
        $rules->add($rules->existsIn(['slider_subCategory_id'], 'SliderSubCategories'));

        return $rules;
    }
}
