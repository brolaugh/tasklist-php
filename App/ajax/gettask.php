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
  $s = new Select();
  $task = $s->getAllTaskWithStatus($_POST['task']);
  $tl = $s->getAllStatusLevels();
  $taskWriter = new App\Task($task);
  $taskWriter->setChangeableStatuses($status_level);
  $taskWriter->printTask();
