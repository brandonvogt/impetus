<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $task->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $task->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Tasks'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Db Users'), ['controller' => 'DbUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Db User'), ['controller' => 'DbUsers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Completions'), ['controller' => 'Completions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Completion'), ['controller' => 'Completions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Streaks'), ['controller' => 'Streaks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Streak'), ['controller' => 'Streaks', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tasks form large-9 medium-8 columns content">
    <?= $this->Form->create($task) ?>
    <fieldset>
        <legend><?= __('Edit Task') ?></legend>
        <?php
            echo $this->Form->input('db_user_id', ['options' => $dbUsers]);
            echo $this->Form->input('name');
            echo $this->Form->input('details');
            echo $this->Form->input('task_type');
            echo $this->Form->input('worth');
            echo $this->Form->input('asort');
            echo $this->Form->input('completed');
            echo $this->Form->input('is_recurring');
            echo $this->Form->input('recur_amount');
            echo $this->Form->input('recur_start');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
