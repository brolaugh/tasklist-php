<?php
/**
 * Created by PhpStorm.
 * User: brolaugh
 * Date: 2/25/16
 * Time: 9:22 PM
 */

namespace App\database;


class Select extends dbSetup
{

/**
* @return array
*/
  public function getAllTasks(){
    $stmt = $this->getDb()->prepare("SELECT * FROM status");
    $stmt->execute();
    $res = $stmt->get_result();
    $a  = array();
    while($row = $res->fetch_object()){
      array_push($a, $row);
    }
    $stmt->close();
    return $a;
  }

  /**
   * @return array
   */
  public function getAllUnFinishedTasks(){
    $stmt = $this->getDb()->prepare("SELECT * FROM status");
    $stmt->execute();
    $res = $stmt->get_result();
    $a  = array();
    while($row = $res->fetch_object()){
      array_push($a, $row);
    }
    $stmt->close();
    return $a;
  }
  public function getAllDoneTasks(){
    $stmt = $this->getDb()->prepare("");
    $stmt->execute();
    $res = $stmt->get_result();
    $a  = array();
    while($row = $res->fetch_object()){
      array_push($a, $row);
    }
    $stmt->close();
    return $a;
  }
}