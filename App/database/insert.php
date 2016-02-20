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