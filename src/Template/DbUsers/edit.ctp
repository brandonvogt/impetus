<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $dbUser->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $dbUser->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Db Users'), ['action' => 'index']) ?></li>
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
<div class="dbUsers form large-9 medium-8 columns content">
    <?= $this->Form->create($dbUser) ?>
    <fieldset>
        <legend><?= __('Edit Db User') ?></legend>
        <?php
            echo $this->Form->input('username');
            echo $this->Form->input('password');
            echo $this->Form->input('email');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
