<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Reward'), ['action' => 'edit', $reward->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Reward'), ['action' => 'delete', $reward->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reward->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Rewards'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reward'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Db Users'), ['controller' => 'DbUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Db User'), ['controller' => 'DbUsers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="rewards view large-9 medium-8 columns content">
    <h3><?= h($reward->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Db User') ?></th>
            <td><?= $reward->has('db_user') ? $this->Html->link($reward->db_user->id, ['controller' => 'DbUsers', 'action' => 'view', $reward->db_user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($reward->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Link') ?></th>
            <td><?= h($reward->link) ?></td>
        </tr>
        <tr>
            <th><?= __('Details') ?></th>
            <td><?= h($reward->details) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($reward->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Worth') ?></th>
            <td><?= $this->Number->format($reward->worth) ?></td>
        </tr>
        <tr>
            <th><?= __('Asort') ?></th>
            <td><?= $this->Number->format($reward->asort) ?></td>
        </tr>
        <tr>
            <th><?= __('Consumable') ?></th>
            <td><?= $reward->consumable ? __('Yes') : __('No'); ?></td>
         </tr>
        <tr>
            <th><?= __('Completed') ?></th>
            <td><?= $reward->completed ? __('Yes') : __('No'); ?></td>
         </tr>
    </table>
</div>
