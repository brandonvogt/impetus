<?php
namespace App\Model\Table;

use App\Model\Entity\Streak;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\I18n\Time;

/**
 * Streaks Model
 *
 * @property \Cake\ORM\Association\BelongsTo $DbUsers
 * @property \Cake\ORM\Association\BelongsTo $Tasks
 */
class StreaksTable extends Table
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

        $this->table('streaks');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('DbUsers', [
            'foreignKey' => 'db_user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Tasks', [
            'foreignKey' => 'task_id',
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
            ->add('total', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('total');

        $validator
            ->add('ongoing', 'valid', ['rule' => 'boolean'])
            ->allowEmpty('ongoing');

        $validator
            ->allowEmpty('deadline');

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
        $rules->add($rules->existsIn(['task_id'], 'Tasks'));
        return $rules;
    }
    
    public function resolveStreak($tid, $uid) {
        $task = $this->Tasks->get($tid, 
                ['contain' => ['Completions' => function ($q) {
                    return $q
                        ->order(['completed_on' => 'DESC']);
                }, 'Streaks' => function ($q) {
                    return $q
                        ->order(['last_completed' => 'DESC']);
                }]]);
        $now = Time::now();
        
        if (isset($task->completions[0]->completed_on)) {
            $lc = new Time($task->completions[0]->completed_on);
            $diff = $now->copy()->diffInHours($lc);
            if ($diff < 48 && !empty($task->streaks)) {
               $streak = $task->streaks[0];
               $streak->last_completed = Time::now();
               $streak->total += 1;
               $this->save($streak);
            }
            else {
            $streak = $this->newEntity();
            $streak->db_user_id = $uid;
            $streak->task_id = $tid;
            $streak->total = 1;
            $this->save($streak);
            }
        }
        else {
            $streak = $this->newEntity();
            $streak->db_user_id = $uid;
            $streak->task_id = $tid;
            $streak->total = 1;
            $this->save($streak);
        }
        
        return $streak->total;
    }
}
