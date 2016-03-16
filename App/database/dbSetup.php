<?php
/**
 * Created by PhpStorm.
 * User: brolaugh
 * Date: 2/13/16
 * Time: 4:00 AM
 */

namespace App\database;


class dbSetup
{
    private $db;
    private $server = "rickardhforslund.se";
    private $username = "brolaugh";
    private $password = "hannes";
    private $database = "brolaugh_tasklist";


    /**
     * dbSetup constructor.
     */
    public function __construct(){
        $this->db = new \Mysqli($this->server, $this->username, $this->password, $this->database);
        if(!$this->db->set_charset("utf8")) {
            printf("Error loading character set utf8: %s\n", $this->db->error);
            exit();
        }
    }
    public function __destruct() {
       $this->db->close();
   }

    /**
     * @return Mysqli
     */
    protected function getDb()
    {
        return $this->db;
    }
    protected function makeValuesReferenced(&$arr)
      {
          $refs = array();
          foreach($arr as $key => $value)
              $refs[$key] = &$arr[$key];
          return $refs;
      }
}
