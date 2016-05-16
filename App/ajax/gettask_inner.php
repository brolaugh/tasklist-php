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
$taskWriter = new App\Task($task);
$taskWriter->setChangeableStatuses($status_level);
$taskWriter->printInnerTask();
