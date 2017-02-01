<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Streak'), ['action' => 'edit', $streak->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Streak'), ['action' => 'delete', $streak->id], ['confirm' => __('Are you sure you want to delete # {0}?', $streak->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Streaks'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Streak'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Db Users'), ['controller' => 'DbUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Db User'), ['controller' => 'DbUsers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tasks'), ['controller' => 'Tasks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Task'), ['controller' => 'Tasks', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="streaks view large-9 medium-8 columns content">
    <h3><?= h($streak->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Db User') ?></th>
            <td><?= $streak->has('db_user') ? $this->Html->link($streak->db_user->id, ['controller' => 'DbUsers', 'action' => 'view', $streak->db_user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Task') ?></th>
            <td><?= $streak->has('task') ? $this->Html->link($streak->task->name, ['controller' => 'Tasks', 'action' => 'view', $streak->task->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($streak->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Total') ?></th>
            <td><?= $this->Number->format($streak->total) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($streak->created) ?></tr>
        </tr>
        <tr>
            <th><?= __('Deadline') ?></th>
            <td><?= h($streak->deadline) ?></tr>
        </tr>
        <tr>
            <th><?= __('Ongoing') ?></th>
            <td><?= $streak->ongoing ? __('Yes') : __('No'); ?></td>
         </tr>
    </table>
</div>
