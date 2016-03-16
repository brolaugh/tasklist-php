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
  public function getTaskWithStatus($taskID)
  {
    $stmt = $this->getDb()->prepare("SELECT * FROM task_with_status WHERE id = ?");
    $stmt->bind_param('i', $taskID);
    $stmt->execute();
    $res = $stmt->get_result();
    $a = array();
    $retval = $res->fetch_object();
    $stmt->close();
    return $retval;
  }
  /**
   * @return object array
   */
  public function getAllTasksWithStatus()
  {
    $stmt = $this->getDb()->prepare("SELECT * FROM task_with_status");
    $stmt->execute();
    $res = $stmt->get_result();
    $a = array();
    while ($row = $res->fetch_object()) {
      array_push($a, $row);
    }
    $stmt->close();
    return $a;
  }

  public function getAllStatusLevels()
  {
    $stmt = $this->getDb()->prepare("SELECT * FROM status_level");
    $stmt->execute();
    $res = $stmt->get_result();
    $a = array();
    while ($row = $res->fetch_object()) {
      array_push($a, $row);
    }
    $stmt->close();
    return $a;
  }

  /**
   * @param int array $taskID
   */
  public function getTasksWithFollowingStatus($taskID=array(1))
  {
    $query = "SELECT task_with_status.id as id, title, description, user, level, stamp, task_with_status.style_class as style_class, status_level.id as level_id FROM `task_with_status` LEFT JOIN status_level ON task_with_status.level=status_level.plain_text ORDER BY stamp DESC";
    $param = "";
    $secondParam = $taskID;
    if (count($taskID) > 0) {
      $query .= " WHERE status_level.id IN(";
      for ($i = 0; $i < count($taskID); $i++) {
        if ($i != (count($taskID) - 1)){
          $query .= "?,";
          $param .= "i";
        }
        else{
          $query .= "?";
          $param .= "i";
        }

      }

      $query .= ")";
    }
    array_unshift($secondParam, $param);
    $stmt = $this->getDb()->prepare($query);
    call_user_func_array(array($stmt, "bind_param"), $this->makeValuesReferenced($secondParam));
    $stmt->execute();
    $res = $stmt->get_result();
    $a = array();
    while($row = $res->fetch_object()){
      $a[] = $row;
    }
    return $a;
  }
  public function getTaskStatusHistory($taskID){
    $stmt = $this->getDb()->prepare("SELECT user, stamp, plain_text, style_class FROM task_history WHERE task = ?");
    $stmt->bind_param('i', $taskID);
    $stmt->execute();

    $res = $stmt->get_result();
    $a = [];
    while($row = $res->fetch_object){
      $a[] = $row;
    }
    return $a;
  }
}
