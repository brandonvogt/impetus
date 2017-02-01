<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li class="list-group-item"><span class="badge"><?= $this->Html->link(__('New'), ['controller' => 'DbUsers', 'action' => 'add']) ?></span><?= $this->Html->link(__('List Users'), ['controller' => 'DbUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Tasks'), ['controller' => 'Tasks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Task'), ['controller' => 'Tasks', 'action' => 'add']) ?></li>

        <li><?= $this->Html->link(__('List Rewards'), ['controller' => 'Tasks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reward'), ['controller' => 'Tasks', 'action' => 'add']) ?></li>

        <li><?= $this->Html->link(__('List Completions'), ['controller' => 'Tasks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Completion'), ['controller' => 'Tasks', 'action' => 'add']) ?></li>

        <li><?= $this->Html->link(__('List Streaks'), ['controller' => 'Tasks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Streak'), ['controller' => 'Tasks', 'action' => 'add']) ?></li>
    </ul>
</nav>