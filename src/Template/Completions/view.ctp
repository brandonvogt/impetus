<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Completion'), ['action' => 'edit', $completion->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Completion'), ['action' => 'delete', $completion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $completion->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Completions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Completion'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Db Users'), ['controller' => 'DbUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Db User'), ['controller' => 'DbUsers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tasks'), ['controller' => 'Tasks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Task'), ['controller' => 'Tasks', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="completions view large-9 medium-8 columns content">
    <h3><?= h($completion->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Db User') ?></th>
            <td><?= $completion->has('db_user') ? $this->Html->link($completion->db_user->id, ['controller' => 'DbUsers', 'action' => 'view', $completion->db_user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Task Type') ?></th>
            <td><?= h($completion->task_type) ?></td>
        </tr>
        <tr>
            <th><?= __('Task') ?></th>
            <td><?= $completion->has('task') ? $this->Html->link($completion->task->name, ['controller' => 'Tasks', 'action' => 'view', $completion->task->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($completion->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Completed On') ?></th>
            <td><?= h($completion->completed_on) ?></tr>
        </tr>
    </table>
</div>
