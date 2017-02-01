<?php
namespace App\Model\Table;

use App\Model\Entity\DbUser;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DbUsers Model
 *
 * @property \Cake\ORM\Association\HasMany $Completions
 * @property \Cake\ORM\Association\HasMany $Rewards
 * @property \Cake\ORM\Association\HasMany $Streaks
 * @property \Cake\ORM\Association\HasMany $Tasks
 */
class DbUsersTable extends Table
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

        $this->table('db_users');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Completions', [
            'foreignKey' => 'db_user_id'
        ]);
        $this->hasMany('Rewards', [
            'foreignKey' => 'db_user_id'
        ]);
        $this->hasMany('Streaks', [
            'foreignKey' => 'db_user_id'
        ]);
        $this->hasMany('Tasks', [
            'foreignKey' => 'db_user_id'
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
            ->allowEmpty('username');

        $validator
            ->allowEmpty('password');

        $validator
            ->add('email', 'valid', ['rule' => 'email'])
            ->allowEmpty('email');

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
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));
        return $rules;
    }
    
    public function addGold($uid, $tid, $bonus) {
        $user = $this->get($uid);
        $task = $this->Tasks->get($tid);
        $mult = 1;
        $roll = mt_rand(1,6);
        if ($task->worth > 0 && $roll == 6) {
            $mult = 2;
        }
        
        $sub = $task->worth + $bonus;
        $user->gold += $sub * $mult;
        if ($this->save($user)) {
                return $mult;
            } else {
                return 0;
            }
    }
    public function remGold($uid, $amount) {
        $user = $this->get($uid);
        $user->gold -= $amount;
        if ($this->save($user)) {
                return 1;
            } else {
                return 0;
            }
    }
}
