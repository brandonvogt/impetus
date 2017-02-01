<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $streak->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $streak->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Streaks'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Db Users'), ['controller' => 'DbUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Db User'), ['controller' => 'DbUsers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tasks'), ['controller' => 'Tasks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Task'), ['controller' => 'Tasks', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="streaks form large-9 medium-8 columns content">
    <?= $this->Form->create($streak) ?>
    <fieldset>
        <legend><?= __('Edit Streak') ?></legend>
        <?php
            echo $this->Form->input('db_user_id', ['options' => $dbUsers]);
            echo $this->Form->input('task_id', ['options' => $tasks]);
            echo $this->Form->input('total');
            echo $this->Form->input('ongoing');
            echo $this->Form->input('deadline');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
