<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Task'), ['action' => 'edit', $task->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Task'), ['action' => 'delete', $task->id], ['confirm' => __('Are you sure you want to delete # {0}?', $task->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tasks'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Task'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Db Users'), ['controller' => 'DbUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Db User'), ['controller' => 'DbUsers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Completions'), ['controller' => 'Completions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Completion'), ['controller' => 'Completions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Streaks'), ['controller' => 'Streaks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Streak'), ['controller' => 'Streaks', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tasks view large-9 medium-8 columns content">
    <h3><?= h($task->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Db User') ?></th>
            <td><?= $task->has('db_user') ? $this->Html->link($task->db_user->id, ['controller' => 'DbUsers', 'action' => 'view', $task->db_user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($task->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Details') ?></th>
            <td><?= h($task->details) ?></td>
        </tr>
        <tr>
            <th><?= __('Task Type') ?></th>
            <td><?= h($task->task_type) ?></td>
        </tr>
        <tr>
            <th><?= __('Recur Resolution') ?></th>
            <td><?= h($task->recur_resolution) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($task->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Worth') ?></th>
            <td><?= $this->Number->format($task->worth) ?></td>
        </tr>
        <tr>
            <th><?= __('Asort') ?></th>
            <td><?= $this->Number->format($task->asort) ?></td>
        </tr>
        <tr>
            <th><?= __('Recur Amount') ?></th>
            <td><?= $this->Number->format($task->recur_amount) ?></td>
        </tr>
        <tr>
            <th><?= __('Recur Start') ?></th>
            <td><?= h($task->recur_start) ?></tr>
        </tr>
        <tr>
            <th><?= __('Completed') ?></th>
            <td><?= $task->completed ? __('Yes') : __('No'); ?></td>
         </tr>
        <tr>
            <th><?= __('Is Recurring') ?></th>
            <td><?= $task->is_recurring ? __('Yes') : __('No'); ?></td>
         </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Completions') ?></h4>
        <?php if (!empty($task->completions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Db User Id') ?></th>
                <th><?= __('Completed On') ?></th>
                <th><?= __('Task Type') ?></th>
                <th><?= __('Task Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($task->completions as $completions): ?>
            <tr>
                <td><?= h($completions->id) ?></td>
                <td><?= h($completions->db_user_id) ?></td>
                <td><?= h($completions->completed_on) ?></td>
                <td><?= h($completions->task_type) ?></td>
                <td><?= h($completions->task_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Completions', 'action' => 'view', $completions->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Completions', 'action' => 'edit', $completions->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Completions', 'action' => 'delete', $completions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $completions->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Streaks') ?></h4>
        <?php if (!empty($task->streaks)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Db User Id') ?></th>
                <th><?= __('Task Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Total') ?></th>
                <th><?= __('Ongoing') ?></th>
                <th><?= __('Deadline') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($task->streaks as $streaks): ?>
            <tr>
                <td><?= h($streaks->id) ?></td>
                <td><?= h($streaks->db_user_id) ?></td>
                <td><?= h($streaks->task_id) ?></td>
                <td><?= h($streaks->created) ?></td>
                <td><?= h($streaks->total) ?></td>
                <td><?= h($streaks->ongoing) ?></td>
                <td><?= h($streaks->deadline) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Streaks', 'action' => 'view', $streaks->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Streaks', 'action' => 'edit', $streaks->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Streaks', 'action' => 'delete', $streaks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $streaks->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
