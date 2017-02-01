        <?php if (!empty($tasks)) : ?>
            <?php foreach ($tasks as $task) : ?>
            <div class="taskcontainer">
                <div class="taskdiv">
                    <?= $this->Html->image('unchecked.png', ['onclick' => 'completeTask(' . $task->id . ',"'. $task->task_type . '")', 'class' => 'checkimg ihover']); ?>
                    <span class="task-item"><?= $task->name ?></span>
                </div>
                <div class="golddiv">
                    <span class="task-worth"><?= $task->worth ?> </span><?= $this->Html->image('gold.png', ['class' => 'goldimg']) ?>
                </div>
                <div class="deldiv">
                    <?= $this->Html->image('delete.png', ['onclick' => 'delTask(' . $task->id . ',"'. $task->task_type . '")', 'class' => 'trashbin ihover']) ?>
                </div>
            </div>
            <?php endforeach; ?>
        <?php else : ?>
        <p>What have you been putting off?</p>
        <?php endif; ?>
        <div class="centered">
            <?= $this->Html->image('add.png', ['url' => '#modaltask', 'class' => 'addnew']) ?><br /> <br />
            <?= $this->Html->link('All Tasks', ['controller' => 'Tasks', 'action' => 'listTasks']) ?>
        </div>
        
