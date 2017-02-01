
<div class="tasks form large-9 medium-8 columns content">
    <?= $this->Form->create($task) ?>
    <fieldset>
        <legend><?= __('Edit Task') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('details');
            echo $this->Form->input('task_type');
            echo $this->Form->input('worth');
            echo $this->Form->input('completed');
            echo $this->Form->input('is_recurring');
            echo $this->Form->input('recur_amount');
            echo $this->Form->input('recur_start');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
