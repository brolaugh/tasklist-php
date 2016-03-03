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
  public function getAllTasks()
  {
    $stmt = $this->getDb()->prepare("SELECT * FROM task");
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
   * @return array
   */
  public function getAllUnFinishedTasks()
  {
    $stmt = $this->getDb()->prepare("SELECT * FROM status");
    $stmt->execute();
    $res = $stmt->get_result();
    $a = array();
    while ($row = $res->fetch_object()) {
      array_push($a, $row);
    }
    $stmt->close();
    return $a;
  }

  public function getAllDoneTasks()
  {
    $stmt = $this->getDb()->prepare("");
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
    $query = "SELECT task_with_status.id as id, title, description, user, level, stamp, task_with_status.style_class as style_class, status_level.id as level_id FROM `task_with_status` LEFT JOIN status_level ON task_with_status.level=status_level.plain_text";
    $param = "";
    $secondParam = $taskID;
    if (count($taskID) > 0) {
      $query .= " WHERE status_level.id IN(";
      for ($i = 0; $i < count($taskID); $i++) {
        if ($i != count($taskID) - 1)
          $query .= "?,";
        else
          $query .= "?";
        $param .= "i";
      }

      $query .= ")";
    }
    array_unshift($secondParam, $param);
    $stmt = $this->getDb()->prepare($query);
    var_dump($secondParam);
    call_user_func_array(array($stmt, "bind_param"), $this->makeValuesReferenced($secondParam));
    $stmt->execute();
    $res = $stmt->get_result();
    $a = array();
    while($row = $res->fetch_object()){
      $a[] = $row;
    }
    return $a;
  }
}
