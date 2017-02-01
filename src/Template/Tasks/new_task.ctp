<div class="tasks form large-9 medium-8 columns content">
    <?= $this->Form->create($task) ?>
    <fieldset>
        <legend><?= __('Add Task') ?></legend>
        <?php
            echo $this->Form->hidden('db_user_id', ['value' => $user_id]);
            echo $this->Form->input('name', ['autocomplete' => 'off']);
            echo $this->Form->input('details', ['autocomplete' => 'off']);
            echo $this->Form->input('task_type', ['options' => ['habit' => 'habit', 'daily' => 'daily', 'task' => 'task'], 'default' => $task_type]);
            echo $this->Form->input('worth');
            if ($task_type == 'task') {
            echo $this->Form->input('is_recurring');
            echo $this->Form->input('recur_amount');
            echo $this->Form->input('mult', ['options' => [1 => 'days', 7 => 'weeks', 30 => 'months'], 'label' => '']);
            }
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>