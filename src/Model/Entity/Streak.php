<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Streak Entity.
 *
 * @property int $id
 * @property int $db_user_id
 * @property \App\Model\Entity\DbUser $db_user
 * @property int $task_id
 * @property \App\Model\Entity\Task $task
 * @property \Cake\I18n\Time $created
 * @property int $total
 * @property bool $ongoing
 * @property \Cake\I18n\Time $deadline
 */
class Streak extends Entity
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
