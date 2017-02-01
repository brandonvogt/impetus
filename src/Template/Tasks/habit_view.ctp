<?php if (!empty($habits)) : ?>
        
            <?php foreach ($habits as $habit) : ?>
            <div class="taskcontainer">
                <div class="taskdiv">
                    <?= $this->Html->image('unchecked.png', ['onclick' => 'completeTask(' . $habit->id . ',"'. $habit->task_type . '")', 'class' => 'checkimg ihover']); ?>
                    <span class="task-item"><?= $habit->name ?></span>
                </div>
                <div class="golddiv">
                    <span class="task-worth"><?= $habit->worth ?> </span><?= $this->Html->image('gold.png', ['class' => 'goldimg']) ?>
                </div>
                <div class="deldiv">
                    <?= $this->Html->image('delete.png', ['onclick' => 'delTask(' . $habit->id . ',"'. $habit->task_type . '")', 'class' => 'trashbin ihover']) ?>
                </div>
            </div>
            <?php endforeach; ?>
        
        <?php else : ?>
        <p>You should develop a new habit!</p>
        <?php endif; ?>
        <div class="centered"><?= $this->Html->image('add.png', ['url' => '#modalhabit', 'class' => 'addnew']) ?></div>