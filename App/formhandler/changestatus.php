<?php
/**
 * Created by PhpStorm.
 * User: brolaugh
 * Date: 3/1/16
 * Time: 8:34 PM
 */


chdir("../..");
include_once 'Helper.php';

if(!isset($_REQUEST['task'])){
  header("Location".ROOT."/dashboard");
  exit();
}
else{
  $insert = new \App\database\Insert();
  if(isset($_REQUEST['user']))
    $insert->addStatus($_REQUEST['task'], $_REQUEST['status'], $_REQUEST['user']);
  else
    $insert->addStatus($_REQUEST['task'], $_REQUEST['status']);
}
header("Location:".ROOT."/dashboard");
exit();
?>