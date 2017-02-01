<div class="tasks index large-9 medium-8 columns content">
    <h3><?= __('Tasks') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('completed') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('details') ?></th>
                <th><?= $this->Paginator->sort('task_type') ?></th>
                <th><?= $this->Paginator->sort('worth') ?></th>
                <th><?= $this->Paginator->sort('is_recurring') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tasks as $task): ?>
            <tr>
                <td><?php if ($task->completed == true) {echo "♦";} ?></td>
                <td><?= h($task->name) ?></td>
                <td><?= h($task->details) ?></td>
                <td><?= h($task->task_type) ?></td>
                <td><?= $this->Number->format($task->worth) ?></td>
                <td><?php if ($task->is_recurring == true) {echo "♦";} ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'editTask', $task->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'del', $task->id], ['confirm' => __('Are you sure you want to delete # {0}?', $task->id)]) ?>
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
