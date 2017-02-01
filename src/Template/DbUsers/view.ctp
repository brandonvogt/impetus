<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Db User'), ['action' => 'edit', $dbUser->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Db User'), ['action' => 'delete', $dbUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dbUser->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Db Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Db User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Completions'), ['controller' => 'Completions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Completion'), ['controller' => 'Completions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rewards'), ['controller' => 'Rewards', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reward'), ['controller' => 'Rewards', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Streaks'), ['controller' => 'Streaks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Streak'), ['controller' => 'Streaks', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tasks'), ['controller' => 'Tasks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Task'), ['controller' => 'Tasks', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="dbUsers view large-9 medium-8 columns content">
    <h3><?= h($dbUser->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Username') ?></th>
            <td><?= h($dbUser->username) ?></td>
        </tr>
        <tr>
            <th><?= __('Password') ?></th>
            <td><?= h($dbUser->password) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($dbUser->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($dbUser->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($dbUser->created) ?></tr>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($dbUser->modified) ?></tr>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Completions') ?></h4>
        <?php if (!empty($dbUser->completions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Db User Id') ?></th>
                <th><?= __('Completed On') ?></th>
                <th><?= __('Task Type') ?></th>
                <th><?= __('Task Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($dbUser->completions as $completions): ?>
            <tr>
                <td><?= h($completions->id) ?></td>
                <td><?= h($completions->db_user_id) ?></td>
                <td><?= h($completions->completed_on) ?></td>
                <td><?= h($completions->task_type) ?></td>
                <td><?= h($completions->task_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Completions', 'action' => 'view', $completions->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Completions', 'action' => 'edit', $completions->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Completions', 'action' => 'delete', $completions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $completions->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Rewards') ?></h4>
        <?php if (!empty($dbUser->rewards)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Db User Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Link') ?></th>
                <th><?= __('Details') ?></th>
                <th><?= __('Worth') ?></th>
                <th><?= __('Asort') ?></th>
                <th><?= __('Consumable') ?></th>
                <th><?= __('Completed') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($dbUser->rewards as $rewards): ?>
            <tr>
                <td><?= h($rewards->id) ?></td>
                <td><?= h($rewards->db_user_id) ?></td>
                <td><?= h($rewards->name) ?></td>
                <td><?= h($rewards->link) ?></td>
                <td><?= h($rewards->details) ?></td>
                <td><?= h($rewards->worth) ?></td>
                <td><?= h($rewards->asort) ?></td>
                <td><?= h($rewards->consumable) ?></td>
                <td><?= h($rewards->completed) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Rewards', 'action' => 'view', $rewards->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Rewards', 'action' => 'edit', $rewards->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Rewards', 'action' => 'delete', $rewards->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rewards->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Streaks') ?></h4>
        <?php if (!empty($dbUser->streaks)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Db User Id') ?></th>
                <th><?= __('Task Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Total') ?></th>
                <th><?= __('Ongoing') ?></th>
                <th><?= __('Deadline') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($dbUser->streaks as $streaks): ?>
            <tr>
                <td><?= h($streaks->id) ?></td>
                <td><?= h($streaks->db_user_id) ?></td>
                <td><?= h($streaks->task_id) ?></td>
                <td><?= h($streaks->created) ?></td>
                <td><?= h($streaks->total) ?></td>
                <td><?= h($streaks->ongoing) ?></td>
                <td><?= h($streaks->deadline) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Streaks', 'action' => 'view', $streaks->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Streaks', 'action' => 'edit', $streaks->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Streaks', 'action' => 'delete', $streaks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $streaks->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Tasks') ?></h4>
        <?php if (!empty($dbUser->tasks)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Db User Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Details') ?></th>
                <th><?= __('Task Type') ?></th>
                <th><?= __('Worth') ?></th>
                <th><?= __('Asort') ?></th>
                <th><?= __('Completed') ?></th>
                <th><?= __('Is Recurring') ?></th>
                <th><?= __('Recur Amount') ?></th>
                <th><?= __('Recur Resolution') ?></th>
                <th><?= __('Recur Start') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($dbUser->tasks as $tasks): ?>
            <tr>
                <td><?= h($tasks->id) ?></td>
                <td><?= h($tasks->db_user_id) ?></td>
                <td><?= h($tasks->name) ?></td>
                <td><?= h($tasks->details) ?></td>
                <td><?= h($tasks->task_type) ?></td>
                <td><?= h($tasks->worth) ?></td>
                <td><?= h($tasks->asort) ?></td>
                <td><?= h($tasks->completed) ?></td>
                <td><?= h($tasks->is_recurring) ?></td>
                <td><?= h($tasks->recur_amount) ?></td>
                <td><?= h($tasks->recur_resolution) ?></td>
                <td><?= h($tasks->recur_start) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Tasks', 'action' => 'view', $tasks->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Tasks', 'action' => 'edit', $tasks->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tasks', 'action' => 'delete', $tasks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tasks->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
