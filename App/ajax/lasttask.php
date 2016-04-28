<?php
/**
* Created by PhpStorm.
* User: brolaugh
* Date: 3/1/16
* Time: 9:03 PM
*/


chdir("../..");
include_once 'Helper.php';

$s = new \App\database\Select();
$task = $s->getLastTask();
$status_level = $s->getAllStatusLevels();
?>
<div class="well well-xs status-<?php echo $task->level;?>">
  <h3>
    <span ><?php echo $task->title; ?></span>
    <div class="btn-group">
      <div class="btn-toolbar">
        <div class="btn-group">
          <a href="bootstrap-elements.html" data-target="#" class="btn btn-raised btn-<?php echo $task->style_class;?> dropdown-toggle"
            data-toggle="dropdown">
            <?php echo $task->level ;?>
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <?php
            foreach ($status_level as $tl) {
              if ($task->level != $tl->plain_text) {
                ?>
                <li data-toggle="modal" data-target="#statusmodal" onclick="javascript:modalFix(<?php echo $task->id . "," . $tl->id . ",'" . $task->title."'";?>)">
                  <span class="text-<?php echo $tl->style_class; ?>"><?php echo $tl->plain_text; ?></span>
                </li>
                <?php
              }
            }

            ?>
          </ul>
        </div>
      </div>
    </div>
  </h3>
  <p class="text-primary">
    <?php echo $task->description; ?>
  </p>
  <p class="text-muted small">
    Uppdaterad <?php echo $task->stamp . " av " . $task->user;?>
  </p>
</div>
