<?php
/**
 * Created by PhpStorm.
 * User: brolaugh
 * Date: 3/1/16
 * Time: 9:03 PM
 */


chdir("../..");
include_once 'Helper.php';

//$statuses = $_POST['statuses'];
if(!isset($_POST['task'])){
  exit();
}
  $s = new \App\database\Select();
  $task = $s->getTaskWithStatus($_POST['task']);
  $status_level = $s->getAllStatusLevels();
  ?>
    <h3>
      <span class="pull-left"><?php echo $task->title; ?></span>
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
                  <li><a
                      href="<?php echo ROOT . "/App/formhandler/changestatus.php?task=" . $task->id . "&status=" . $tl->id; ?>"><span
                        class="text-<?php echo $tl->style_class; ?>"><?php echo $tl->plain_text; ?></span></a></li>
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
