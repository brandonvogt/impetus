<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Streak'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Db Users'), ['controller' => 'DbUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Db User'), ['controller' => 'DbUsers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tasks'), ['controller' => 'Tasks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Task'), ['controller' => 'Tasks', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="streaks index large-9 medium-8 columns content">
    <h3><?= __('Streaks') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('db_user_id') ?></th>
                <th><?= $this->Paginator->sort('task_id') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('total') ?></th>
                <th><?= $this->Paginator->sort('ongoing') ?></th>
                <th><?= $this->Paginator->sort('deadline') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($streaks as $streak): ?>
            <tr>
                <td><?= $this->Number->format($streak->id) ?></td>
                <td><?= $streak->has('db_user') ? $this->Html->link($streak->db_user->id, ['controller' => 'DbUsers', 'action' => 'view', $streak->db_user->id]) : '' ?></td>
                <td><?= $streak->has('task') ? $this->Html->link($streak->task->name, ['controller' => 'Tasks', 'action' => 'view', $streak->task->id]) : '' ?></td>
                <td><?= h($streak->created) ?></td>
                <td><?= $this->Number->format($streak->total) ?></td>
                <td><?= h($streak->ongoing) ?></td>
                <td><?= h($streak->deadline) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $streak->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $streak->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $streak->id], ['confirm' => __('Are you sure you want to delete # {0}?', $streak->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
