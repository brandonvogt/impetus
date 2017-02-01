<?php if (!empty($dailies)) : ?>
            <?php foreach ($dailies as $daily) : ?>
            <?php if ($daily->completed == 1) : ?>
                <div class="taskcontainer">
                    <div class="taskdiv">
                        <?= $this->Html->image('checked.png', ['class' => 'checkimg']); ?>
                        <span class="task-item strikethrough"><?= $daily->name ?></span>
                    </div>
                    <div class="streakdiv">
                        
                            <?php if (!empty($daily->streaks[0])) {
                                    if ($daily->streaks[0]->total >= 100) {
                                       echo '<span class="streak100">' .  $daily->streaks[0]->total . '</span>';
                                    }
                                    elseif ($daily->streaks[0]->total >= 50) {
                                        echo '<span class="streak50">' .  $daily->streaks[0]->total . '</span>';
                                    }
                                    elseif ($daily->streaks[0]->total >= 25) {
                                        echo '<span class="streak25">' .  $daily->streaks[0]->total . '</span>';
                                    }
                                    elseif ($daily->streaks[0]->total >= 10) {
                                        echo '<span class="streak10">' .  $daily->streaks[0]->total . '</span>';
                                    }
                                    elseif ($daily->streaks[0]->total >= 5) {
                                        echo '<span class="streak5">' .  $daily->streaks[0]->total . '</span>';
                                    }
                                    else {
                                        echo '<span>' .  $daily->streaks[0]->total . '</span>';
                                    }   
                                }
                                else {echo '<span> </span>';}
                            ?>
                    </div>
                    <div class="golddiv">
                         
                        <span class="task-worth"><?= $daily->worth ?> </span><?= $this->Html->image('gold.png', ['class' => 'goldimg']) ?>
                    </div>
                    <div class="deldiv">
                        <?= $this->Html->image('delete.png', ['onclick' => 'delTask(' . $daily->id . ',"'. $daily->task_type . '")', 'class' => 'trashbin ihover']) ?>
                    </div>
                </div>
            <?php else : ?>
                <div class="taskcontainer">
                    <div class="taskdiv">
                        <?= $this->Html->image('unchecked.png', ['onclick' => 'completeTask(' . $daily->id . ',"'. $daily->task_type . '")', 'class' => 'checkimg ihover']); ?>
                        <span class="task-item"><?= $daily->name ?></span>
                    </div>
                        <div class="streakdiv">
                            <?php if (!empty($daily->streaks[0])) {
                                    if ($daily->streaks[0]->total >= 100) {
                                       echo '<span class="streak100">' .  $daily->streaks[0]->total . '</span>';
                                    }
                                    elseif ($daily->streaks[0]->total >= 50) {
                                        echo '<span class="streak50">' .  $daily->streaks[0]->total . '</span>';
                                    }
                                    elseif ($daily->streaks[0]->total >= 25) {
                                        echo '<span class="streak25">' .  $daily->streaks[0]->total . '</span>';
                                    }
                                    elseif ($daily->streaks[0]->total >= 10) {
                                        echo '<span class="streak10">' .  $daily->streaks[0]->total . '</span>';
                                    }
                                    elseif ($daily->streaks[0]->total >= 5) {
                                        echo '<span class="streak5">' .  $daily->streaks[0]->total . '</span>';
                                    }
                                    else {
                                        echo '<span>' .  $daily->streaks[0]->total . '</span>';
                                    }   
                                }
                                else {echo '<span> </span>';}
                            ?>
                    </div>
                    <div class="golddiv">
                        <span class="task-worth"><?= $daily->worth ?> </span><?= $this->Html->image('gold.png', ['class' => 'goldimg']) ?>
                    </div>
                    <div class="deldiv">
                        <?= $this->Html->image('delete.png', ['onclick' => 'delTask(' . $daily->id . ',"'. $daily->task_type . '")', 'class' => 'trashbin ihover']) ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php endforeach; ?>
        <?php else : ?>
        <p>What's something you can commit to every day?</p>
        <?php endif; ?>
        <div class="centered"><?= $this->Html->image('add.png', ['url' => '#modaldaily', 'class' => 'addnew']) ?></div>