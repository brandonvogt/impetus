<?php
namespace App\Model\Table;

use App\Model\Entity\Reward;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Rewards Model
 *
 * @property \Cake\ORM\Association\BelongsTo $DbUsers
 */
class RewardsTable extends Table
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

        $this->table('rewards');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('DbUsers', [
            'foreignKey' => 'db_user_id',
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
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->allowEmpty('link');

        $validator
            ->allowEmpty('details');

        $validator
            ->add('worth', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('worth');

        $validator
            ->add('asort', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('asort');

        $validator
            ->add('consumable', 'valid', ['rule' => 'boolean'])
            ->allowEmpty('consumable');

        $validator
            ->add('completed', 'valid', ['rule' => 'boolean'])
            ->allowEmpty('completed');

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
        $rules->add($rules->existsIn(['db_user_id'], 'DbUsers'));
        return $rules;
    }
        public function findRewardsByUser ($uid) {
        $query = $this->find()
            ->where([
                'completed' => false,
                'db_user_id' => $uid])
            ->order(['worth' => 'ASC', 'id' => 'ASC']);

        return $query;
    }
}
