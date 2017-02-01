<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Reward'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Db Users'), ['controller' => 'DbUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Db User'), ['controller' => 'DbUsers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="rewards index large-9 medium-8 columns content">
    <h3><?= __('Rewards') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('db_user_id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('link') ?></th>
                <th><?= $this->Paginator->sort('details') ?></th>
                <th><?= $this->Paginator->sort('worth') ?></th>
                <th><?= $this->Paginator->sort('asort') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rewards as $reward): ?>
            <tr>
                <td><?= $this->Number->format($reward->id) ?></td>
                <td><?= $reward->has('db_user') ? $this->Html->link($reward->db_user->id, ['controller' => 'DbUsers', 'action' => 'view', $reward->db_user->id]) : '' ?></td>
                <td><?= h($reward->name) ?></td>
                <td><?= h($reward->link) ?></td>
                <td><?= h($reward->details) ?></td>
                <td><?= $this->Number->format($reward->worth) ?></td>
                <td><?= $this->Number->format($reward->asort) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $reward->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $reward->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $reward->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reward->id)]) ?>
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
