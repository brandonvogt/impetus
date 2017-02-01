<?php
namespace App\Model\Table;

use App\Model\Entity\Task;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\I18n\Time;

/**
 * Tasks Model
 *
 * @property \Cake\ORM\Association\BelongsTo $DbUsers
 * @property \Cake\ORM\Association\HasMany $Completions
 * @property \Cake\ORM\Association\HasMany $Streaks
 */
class TasksTable extends Table
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

        $this->table('tasks');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('DbUsers', [
            'foreignKey' => 'db_user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Completions', [
            'foreignKey' => 'task_id'
        ]);
        $this->hasMany('Streaks', [
            'foreignKey' => 'task_id'
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
            ->allowEmpty('details');

        $validator
            ->requirePresence('task_type', 'create')
            ->notEmpty('task_type');

        $validator
            ->add('worth', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('worth');

        $validator
            ->add('asort', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('asort');

        $validator
            ->add('completed', 'valid', ['rule' => 'boolean'])
            ->allowEmpty('completed');

        $validator
            ->add('is_recurring', 'valid', ['rule' => 'boolean'])
            ->allowEmpty('is_recurring');

        $validator
            ->add('recur_amount', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('recur_amount');

        $validator
            ->allowEmpty('recur_resolution');

        $validator
            ->allowEmpty('recur_start');

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
    
    public function findTaskByType ($uid, $type) {
        $query = $this->find()
            ->where([
                'task_type' => $type,
                'db_user_id' => $uid])
            ->order(['asort' => 'DESC', 'id' => 'ASC']);
        if ($type == 'task') {
            $query->where(['completed' => false]);
        }
        return $query;
    }
    public function markComplete($tid) {
        $task = $this->get($tid);
        $task->completed = 1;
        if ($this->save($task)) {
                return 1;
            } else {
                return 0;
            }
    }
    public function checkRecurring($uid) {
        
        $now = Time::today();
        $query = $this->find()->where([
                    'db_user_id' => $uid,
                    'task_type' => 'task',
                    'is_recurring' => true,
                    'completed' => true
                ])
                ->contain(['Completions' => function ($q) {
                    return $q
                        ->order(['completed_on' => 'DESC']);
                }])
                ->toArray();
        $changed = 0;
        
        foreach($query as $task) {
            $sd = new Time($task->recur_start);
            $diff = $now->copy()->diffInDays($sd);
            $interval = $task->recur_amount;
            $last = $diff % $interval;
            if (isset($task->completions[0]->completed_on)) {
                $lastCompleted = $task->completions[0]->completed_on;
                $lastRecurred = $now->copy()->modify('-'. $last . 'days');

                if ($lastCompleted->lt($lastRecurred)) {
                    $task->completed = false;
                    $this->save($task);
                    $changed ++;
                }
            }
        }
        return $changed;
    }
}
