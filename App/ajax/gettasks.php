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
  $taskWriter = new App\Task($task);
  $taskWriter->setChangeableStatuses($status_level);
  $taskWriter->printTask();
}
?>
