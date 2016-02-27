<?php
/**
 * Created by PhpStorm.
 * User: database
 * Date: 2/13/16
 * Time: 7:49 PM
 */
error_reporting(E_ALL);
ini_set("display_errors", 1);
define("ROOT", "/tasklist-php");
session_start();

//Define autoloader
function __autoload($className) {
  $className = str_replace("\\", "/", $className);
  if (file_exists($className . '.php')) {
    require_once $className . '.php';
    return true;
  }
  return false;
}

function canClassBeAutloaded($className) {
  return class_exists($className);
}
function isLoggedIn(){
  if(isset($_SESSION['user'])){
    if(is_int($_SESSION['user']->getId())){
      return true;
    }
    else{
      session_unset();
      session_destroy();
      return false;
    }
  }

}