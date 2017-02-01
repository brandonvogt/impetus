<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Db User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Completions'), ['controller' => 'Completions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Completion'), ['controller' => 'Completions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rewards'), ['controller' => 'Rewards', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reward'), ['controller' => 'Rewards', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Streaks'), ['controller' => 'Streaks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Streak'), ['controller' => 'Streaks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tasks'), ['controller' => 'Tasks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Task'), ['controller' => 'Tasks', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="dbUsers index large-9 medium-8 columns content">
    <h3><?= __('Db Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('username') ?></th>
                <th><?= $this->Paginator->sort('password') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th><?= $this->Paginator->sort('email') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dbUsers as $dbUser): ?>
            <tr>
                <td><?= $this->Number->format($dbUser->id) ?></td>
                <td><?= h($dbUser->username) ?></td>
                <td><?= $this->Text->truncate($dbUser->password, 10) ?></td>
                <td><?= h($dbUser->created) ?></td>
                <td><?= h($dbUser->modified) ?></td>
                <td><?= h($dbUser->email) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $dbUser->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $dbUser->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $dbUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dbUser->id)]) ?>
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
