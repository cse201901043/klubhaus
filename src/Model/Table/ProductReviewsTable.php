<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProductReviews Model
 *
 * @property \App\Model\Table\ReviewsProductsTable|\Cake\ORM\Association\BelongsTo $ReviewsProducts
 * @property \App\Model\Table\ReviewUsersTable|\Cake\ORM\Association\BelongsTo $ReviewUsers
 *
 * @method \App\Model\Entity\ProductReview get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProductReview newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProductReview[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProductReview|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductReview patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProductReview[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProductReview findOrCreate($search, callable $callback = null, $options = [])
 */
class ProductReviewsTable extends Table
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

        $this->setTable('product_reviews');
        $this->setDisplayField('product_review_id');
        $this->setPrimaryKey('product_review_id');

        $this->belongsTo('ReviewsProducts', [
            'foreignKey' => 'reviews_product_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ReviewUsers', [
            'foreignKey' => 'review_user_id',
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
            ->integer('product_review_id')
            ->allowEmpty('product_review_id', 'create');

        $validator
            ->scalar('review_description')
            ->maxLength('review_description', 255)
            ->requirePresence('review_description', 'create')
            ->notEmpty('review_description');

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
        $rules->add($rules->existsIn(['reviews_product_id'], 'ReviewsProducts'));
        $rules->add($rules->existsIn(['review_user_id'], 'ReviewUsers'));

        return $rules;
    }
}
