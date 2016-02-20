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
    private $server = "mysql443.loopia.se";
    private $username = "brolaugh@b141659";
    private $password = "kattfanMasterrace";
    private $database = "brolaugh_se_db_3";


    /**
     * dbSetup constructor.
     */
    public function __construct(){
        $this->db = new Mysqli($this->server, $this->username, $this->password, $this->database);
        if(!$this->db->set_charset("utf8")) {
            printf("Error loading character set utf8: %s\n", $this->db->error);
            exit();
        }
    }

    /**
     * @return Mysqli
     */
    protected function getDb()
    {
        return $this->db;
    }
}