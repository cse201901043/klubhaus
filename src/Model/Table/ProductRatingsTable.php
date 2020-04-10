<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProductRatings Model
 *
 * @property \App\Model\Table\RatingsProductsTable|\Cake\ORM\Association\BelongsTo $RatingsProducts
 * @property \App\Model\Table\RateUsersTable|\Cake\ORM\Association\BelongsTo $RateUsers
 *
 * @method \App\Model\Entity\ProductRating get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProductRating newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProductRating[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProductRating|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductRating patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProductRating[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProductRating findOrCreate($search, callable $callback = null, $options = [])
 */
class ProductRatingsTable extends Table
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

        $this->setTable('product_ratings');
        $this->setDisplayField('ratings_id');
        $this->setPrimaryKey('ratings_id');

        $this->belongsTo('RatingsProducts', [
            'foreignKey' => 'ratings_product_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('RateUsers', [
            'foreignKey' => 'rate_user_id',
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
            ->integer('ratings_id')
            ->allowEmpty('ratings_id', 'create');

        $validator
            ->numeric('rate_point')
            ->requirePresence('rate_point', 'create')
            ->notEmpty('rate_point');

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
        $rules->add($rules->existsIn(['ratings_product_id'], 'RatingsProducts'));
        $rules->add($rules->existsIn(['rate_user_id'], 'RateUsers'));

        return $rules;
    }
}
