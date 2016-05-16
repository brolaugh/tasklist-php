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
$taskWriter = new App\Task($task);
$taskWriter->setChangeableStatuses($status_level);
$taskWriter->printTask();
