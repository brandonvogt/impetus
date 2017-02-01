<div class="tasks form large-9 medium-8 columns content">
    <?= $this->Form->create($reward) ?>
    <fieldset>
        <legend><?= __('Add Reward') ?></legend>
        <?php
            echo $this->Form->hidden('db_user_id', ['value' => $user_id]);
            echo $this->Form->input('name', ['autocomplete' => 'off']);
            echo $this->Form->input('details', ['autocomplete' => 'off']);
            echo $this->Form->input('link', ['autocomplete' => 'off']);
            echo $this->Form->input('worth');
            echo $this->Form->input('consumable');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>