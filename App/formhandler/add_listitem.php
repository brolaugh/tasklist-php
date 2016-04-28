<?php
/**
 * Created by PhpStorm.
 * User: brolaugh
 * Date: 2/25/16
 * Time: 10:34 PM
 */


chdir("../..");
include_once 'Helper.php';

if(!isset($_POST['tasktitle'])){
  header("Location:../../dashboard");
  exit();
}
$insert = new \App\database\Insert();
$insert->AddCompleteListEntry($_POST['tasktitle'], $_POST['taskbody'], $_POST['taskperson']);

//header("Location:../../dashboard");
