<div class="row row-margin">
    <div class="col-md-4">
        <div class="tasktable col-centered">
            <?= $this->Html->image('header_habits.png', ['class' => 'header-img'])?>
            <div id="habit"></div>
            <div id="habitp" class="cssload-preloader cssload-loading">
                <span class="cssload-slice"></span>
                <span class="cssload-slice"></span>
                <span class="cssload-slice"></span>
                <span class="cssload-slice"></span>
                <span class="cssload-slice"></span>
                <span class="cssload-slice"></span>
            </div>
        </div>
    </div>
    <div class="col-md-4 col">
        <div class="tasktable col-centered">
            <?= $this->Html->image('header_dailies.png', ['class' => 'header-img'])?>
            <div id="daily"></div>
            <div id="dailyp" class="cssload-preloader cssload-loading">
                <span class="cssload-slice"></span>
                <span class="cssload-slice"></span>
                <span class="cssload-slice"></span>
                <span class="cssload-slice"></span>
                <span class="cssload-slice"></span>
                <span class="cssload-slice"></span>
            </div>
        </div>
    </div>
    <div class="col-md-4 col">
        <div class="tasktable col-centered">
            <?= $this->Html->image('header_tasks.png', ['class' => 'header-img'])?>
            <div id="task"></div>
            <div id="taskp" class="cssload-preloader cssload-loading">
                <span class="cssload-slice"></span>
                <span class="cssload-slice"></span>
                <span class="cssload-slice"></span>
                <span class="cssload-slice"></span>
                <span class="cssload-slice"></span>
                <span class="cssload-slice"></span>
            </div>
        </div>
    </div>
</div>
<div class="row row-margin">
    <div class="col-md-4 col-centered maxwidth clearfix">
        <div class="tasktable col-centered">
            <?= $this->Html->image('header_rewards.png', ['class' => 'header-img'])?>
            <div id="reward"></div>
            <div id="rewardp" class="cssload-preloader cssload-loading">
                <span class="cssload-slice"></span>
                <span class="cssload-slice"></span>
                <span class="cssload-slice"></span>
                <span class="cssload-slice"></span>
                <span class="cssload-slice"></span>
                <span class="cssload-slice"></span>
            </div>
        </div>
    </div>
</div>
<div class="remodal" data-remodal-id="modalhabit">
    <button data-remodal-action="close" class="remodal-close"></button>
    <div class="tasks form">
        <?= $this->Form->create('newTask', ['id' => 'habitform', 'class' => 'form-inline', 'url' => ['controller' => 'Tasks', 'action' => 'newTask']]) ?>
        <fieldset>
            <legend><?= __('New Habit') ?></legend>
            <?php
                echo $this->Form->hidden('db_user_id', ['value' => $user_id]);
                echo $this->Form->input('name', ['autocomplete' => 'off', 'class' => 'form-control']);
                echo $this->Form->input('details', ['autocomplete' => 'off', 'class' => 'form-control']);
                echo $this->Form->hidden('task_type', ['value' => 'habit']);
                echo $this->Form->input('worth', ['class' => 'form-control']);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['onclick' => 'submitTask(\'habit\')', 'class' => 'btn btn-primary btn-block btn-margin']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
<div class="remodal" data-remodal-id="modaldaily">
    <button data-remodal-action="close" class="remodal-close"></button>
    <div class="tasks form">
        <?= $this->Form->create('newTask', ['id' => 'dailyform', 'class' => 'form-inline', 'url' => ['controller' => 'Tasks', 'action' => 'newTask']]) ?>
        <fieldset>
            <legend><?= __('New Daily') ?></legend>
            <?php
                echo $this->Form->hidden('db_user_id', ['value' => $user_id]);
                echo $this->Form->input('name', ['autocomplete' => 'off', 'class' => 'form-control']);
                echo $this->Form->input('details', ['autocomplete' => 'off', 'class' => 'form-control']);
                echo $this->Form->hidden('task_type', ['value' => 'daily']);
                echo $this->Form->input('worth', ['class' => 'form-control']);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['onclick' => 'submitTask(\'daily\')', 'class' => 'btn btn-primary btn-block btn-margin']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
<div class="remodal" data-remodal-id="modaltask">
    <button data-remodal-action="close" class="remodal-close"></button>
    <div class="tasks form">
        <?= $this->Form->create('newTask', ['id' => 'taskform', 'class' => 'form-inline', 'url' => ['controller' => 'Tasks', 'action' => 'newTask']]) ?>
        <fieldset>
            <legend><?= __('New Task') ?></legend>
            <?php
                echo $this->Form->hidden('db_user_id', ['value' => $user_id]);
                echo $this->Form->input('name', ['autocomplete' => 'off', 'class' => 'form-control']);
                echo $this->Form->input('details', ['autocomplete' => 'off', 'class' => 'form-control']);
                echo $this->Form->hidden('task_type', ['value' => 'task']);
                echo $this->Form->input('worth', ['class' => 'form-control']);
                echo $this->Form->input('is_recurring', ['label' => 'Recurring?', 'type' => 'checkbox']);
                echo $this->Form->input('recur_amount', ['class' => 'form-control']);
                echo $this->Form->input('mult', ['options' => [1 => 'days', 7 => 'weeks', 30 => 'months'], 'label' => '', 'class' => 'form-control']);

            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['onclick' => 'submitTask(\'task\')', 'class' => 'btn btn-primary btn-block btn-margin']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
<div class="remodal" data-remodal-id="modalreward">
    <button data-remodal-action="close" class="remodal-close"></button>
    <div class="tasks form">
        <?= $this->Form->create('newReward', ['id' => 'rewardform', 'class' => 'form-inline', 'url' => ['controller' => 'Rewards', 'action' => 'newReward']]) ?>
        <fieldset>
            <legend><?= __('Add Reward') ?></legend>
            <?php
                echo $this->Form->hidden('db_user_id', ['value' => $user_id]);
                echo $this->Form->input('name', ['autocomplete' => 'off', 'class' => 'form-control']);
                echo $this->Form->input('details', ['autocomplete' => 'off', 'class' => 'form-control']);
                echo $this->Form->input('link', ['autocomplete' => 'off', 'class' => 'form-control']);
                echo $this->Form->input('worth', ['class' => 'form-control']);
                echo $this->Form->input('consumable' ,['type' => 'checkbox', 'label' => 'Consumable?']);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['onclick' => 'submitReward()', 'class' => 'btn btn-primary btn-block btn-margin']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>

<script>
function loadDoc($target, $view) {
    $.ajax({
        type: 'POST',
        url: $view,
        cache: false,
        data: new Date().getTime(),
        success: function(result) {
            $("#"+$target).html(result).fadeIn();
            $("#"+$target+'p').hide();
        }
    })
}

function completeTask($id, $target) {
    $.ajax({
        type: 'POST',
        url: '/completions/new_comp/' + $id,
        beforeSend: function() {
            $("#"+$target).hide();
            $("#"+$target+'p').show();},
        success: function(result) {
            $("#"+$target).html(result).fadeIn();
            $("#"+$target+'p').hide();
            loadDoc('gold', '/db_users/update_gold/');
            }
        })
}
function delTask($id, $target) {
    $.ajax({
        type: 'POST',
        url: '/tasks/del/' + $id,
        beforeSend: function() {
            $("#"+$target).hide();
            $("#"+$target+'p').show();},
        success: function(result) {
            $("#"+$target).html(result).fadeIn();
            $("#"+$target+'p').hide();
            }
        })
}
function chaChing($id, $target) {
    $.ajax({
        type: 'POST',
        url: '/rewards/redeem/' + $id,
        beforeSend: function() {
            $("#"+$target).hide();
            $("#"+$target+'p').show();},
        success: function(result) {
            $("#"+$target).html(result).fadeIn();
            $("#"+$target+'p').hide();
            loadDoc('gold', '/db_users/update_gold/');
            }
        })
}
function delReward($id, $target) {
    $.ajax({
        type: 'POST',
        url: '/rewards/del/' + $id,
        beforeSend: function() {
            $("#"+$target).hide();
            $("#"+$target+'p').show();},
        success: function(result) {
            $("#"+$target).html(result).fadeIn();
            $("#"+$target+'p').hide();
            }
        })
}
function submitTask($target) {
    $("#"+$target+"form").unbind('submit').bind('submit',function( event ) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/tasks/new_task/',
            data: $("#"+$target+"form").serializeArray(),
            beforeSend: function() {
                $("#"+$target).hide();
                $("#"+$target+'p').show();},
            success: function(result) {
                $("#"+$target+'p').hide();
                $("#"+$target).html(result).fadeIn();
                $('[data-remodal-id=modal'+$target+']').remodal().close();
                $("#"+$target+"form")[0].reset();
                }
            })
     });
}
function submitReward() {
    $("#rewardform").unbind('submit').bind('submit',function( event ) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/rewards/new_reward/',
            data: $("#rewardform").serializeArray(),
            beforeSend: function() {
                $("#reward").hide();
                $("#rewardp").show();},
            success: function(result) {
                $("#rewardp").hide();
                $('[data-remodal-id=modalreward]').remodal().close();
                $("#reward").html(result).fadeIn();
                $("#rewardform")[0].reset();
                }
            })
     });
}
$.ajaxSetup({ cache: false });
loadDoc('gold', '/db_users/update_gold/');
loadDoc('habit', '/tasks/habit_view/');
loadDoc('daily', '/tasks/daily_view/');
loadDoc('task', '/tasks/task_view/');
loadDoc('reward', '/rewards/reward_view/');

</script>