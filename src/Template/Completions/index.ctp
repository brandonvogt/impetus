<?= $this->element('topbar', ['title' => 'Completions']) ?>
<?= $this->element('actions') ?>
<div class="completions index large-9 medium-8 columns content">
    <h3><?= __('Completions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('db_user_id') ?></th>
                <th><?= $this->Paginator->sort('completed_on') ?></th>
                <th><?= $this->Paginator->sort('task_type') ?></th>
                <th><?= $this->Paginator->sort('task_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($completions as $completion): ?>
            <tr>
                <td><?= $this->Number->format($completion->id) ?></td>
                <td><?= $completion->has('db_user') ? $this->Html->link($completion->db_user->id, ['controller' => 'DbUsers', 'action' => 'view', $completion->db_user->id]) : '' ?></td>
                <td><?= h($completion->completed_on) ?></td>
                <td><?= h($completion->task_type) ?></td>
                <td><?= $completion->has('task') ? $this->Html->link($completion->task->name, ['controller' => 'Tasks', 'action' => 'view', $completion->task->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $completion->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $completion->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $completion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $completion->id)]) ?>
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
