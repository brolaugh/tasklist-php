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

$s = new \App\database\Select();
echo "<pre>";
var_dump($s->getStatusesWithFollowingID(array(1,2,3)));
