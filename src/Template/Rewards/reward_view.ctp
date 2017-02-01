        <?php if (!empty($rewards)) : ?>
            <?php foreach ($rewards as $reward) : ?>
            <div class="taskcontainer">
                <div class="taskdiv">
                    <?= $this->Html->image('unchecked.png', ['onclick' => 'completeTask(' . $reward->id . ',"'. $reward->task_type . '")', 'class' => 'checkimg ihover']); ?>
                    <span class="task-item"><?= $reward->name ?></span>
                </div>
                <div class="golddiv">
                    <span class="task-worth"><?= $reward->worth ?> </span><?= $this->Html->image('gold.png', ['class' => 'goldimg']) ?>
                </div>
                <div class="deldiv">
                    <?= $this->Html->image('delete.png', ['onclick' => 'delTask(' . $reward->id . ',"'. $reward->task_type . '")', 'class' => 'trashbin ihover']) ?>
                </div>
            </div>
            <?php endforeach; ?>
        <?php else : ?>
        <p>Add something worth working towards!</p>
        <?php endif; ?>
        <div class="centered"><?= $this->Html->image('add.png', ['url' => '#modalreward', 'class' => 'addnew']) ?></div>