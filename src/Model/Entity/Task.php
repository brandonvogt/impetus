<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Task Entity.
 *
 * @property int $id
 * @property int $db_user_id
 * @property \App\Model\Entity\DbUser $db_user
 * @property string $name
 * @property string $details
 * @property string $task_type
 * @property int $worth
 * @property int $asort
 * @property bool $completed
 * @property bool $is_recurring
 * @property int $recur_amount
 * @property string $recur_resolution
 * @property \Cake\I18n\Time $recur_start
 * @property \App\Model\Entity\Completion[] $completions
 * @property \App\Model\Entity\Streak[] $streaks
 */
class Task extends Entity
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
