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
$a = array();
if(isset($_POST['done']) && $_POST['done'] == true){
  $a[] = 1;
}
if(isset($_POST['undone']) && $_POST['undone'] == true){
  $a[] = 2;
}
if(isset($_POST['indev']) && $_POST['indev'] == true){
  $a[] = 3;
}
if(isset($_POST['prio1']) && $_POST['prio1'] == true){
  $a[] = 4;
}
$s = new \App\database\Select();
if(count($a) > 0)
  $tasks = $s->getTasksWithFollowingStatus($a);
else
  $tasks = $s->getTasksWithFollowingStatus();

$status_level = $s->getAllStatusLevels();
foreach ($tasks as $task) {
  ?>
  <div class="well well-xs">
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
  </div>
  <?php
}
?>
