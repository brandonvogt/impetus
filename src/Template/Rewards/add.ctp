<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Rewards'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Db Users'), ['controller' => 'DbUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Db User'), ['controller' => 'DbUsers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="rewards form large-9 medium-8 columns content">
    <?= $this->Form->create($reward) ?>
    <fieldset>
        <legend><?= __('Add Reward') ?></legend>
        <?php
            echo $this->Form->input('db_user_id', ['options' => $dbUsers]);
            echo $this->Form->input('name');
            echo $this->Form->input('link');
            echo $this->Form->input('details');
            echo $this->Form->input('worth');
            echo $this->Form->input('asort');
            echo $this->Form->input('consumable');
            echo $this->Form->input('completed');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
