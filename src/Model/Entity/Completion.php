<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Completion Entity.
 *
 * @property int $id
 * @property int $db_user_id
 * @property \App\Model\Entity\DbUser $db_user
 * @property \Cake\I18n\Time $completed_on
 * @property string $task_type
 * @property int $task_id
 * @property \App\Model\Entity\Task $task
 */
class Completion extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
