<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Completions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Db Users'), ['controller' => 'DbUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Db User'), ['controller' => 'DbUsers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tasks'), ['controller' => 'Tasks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Task'), ['controller' => 'Tasks', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="completions form large-9 medium-8 columns content">
    <?= $this->Form->create($completion) ?>
    <fieldset>
        <legend><?= __('Add Completion') ?></legend>
        <?php
            echo $this->Form->input('db_user_id', ['options' => $dbUsers]);
            echo $this->Form->input('completed_on');
            echo $this->Form->input('task_type');
            echo $this->Form->input('task_id', ['options' => $tasks]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
