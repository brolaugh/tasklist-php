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
    public function getAllJobs(){
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
    public function getAllUnFinishedJobs(){
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
    public function getAllDoneJobs(){
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