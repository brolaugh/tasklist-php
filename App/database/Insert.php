<?php
/**
 * Created by PhpStorm.
 * User: brolaugh
 * Date: 2/13/16
 * Time: 4:15 AM
 */

namespace App\database;


class Insert extends dbSetup{

  /**
   * @param String $title
   * @param String $detail
   * @param String $person
   */
  public function AddCompleteListEntry($title, $detail, $person){
    $stmt = $this->getDb()->prepare("INSERT INTO task(title, description) values(?,?)");
    $stmt->bind_param('ss', $title, $detail);
    $stmt->execute();
    $this->addStatus($stmt->insert_id, 1, $person);
    $stmt->close();

  }

  /**
   * @param int $task
   * @param int $status_level
   * @param String $user
   */
  public function addStatus($task, $status_level, $user){
    $stmt = $this->getDb()->prepare("INSERT INTO status(task, status_level, user) values(?,?,?)");
    $stmt->bind_param('iis', $task, $status_level, $user);
    $stmt->execute();
    $stmt->close();
  }


}