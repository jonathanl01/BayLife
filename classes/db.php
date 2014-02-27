<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of db
 *
 * @author Jianjun
 */
class BayLifeDB extends mysqli {

    // single instance of self shared among all instances
    private static $instance = null;
    // db connection config vars

    private $user = "f13g07";
    private $pass = "640group7";
    private $dbName = "student_f13g07";
    private $dbHost = "localhost";

    //This method must be static, and must return an instance of the object if the object
    //does not already exist.
    public static function getInstance() {
        if (!self::$instance instanceof self) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    // The clone and wakeup methods prevents external instantiation of copies of the Singleton class,
    // thus eliminating the possibility of duplicate objects.
    public function __clone() {
        trigger_error('Clone is not allowed.', E_USER_ERROR);
    }

    public function __wakeup() {
        trigger_error('Deserializing is not allowed.', E_USER_ERROR);
    }

    // private constructor
    private function __construct() {
        parent::__construct($this->dbHost, $this->user, $this->pass, $this->dbName);
        if (mysqli_connect_error()) {
            exit('Connect Error (' . mysqli_connect_errno() . ') '
                    . mysqli_connect_error());
        }
        parent::set_charset('utf-8');
    }
    
    public function get_biz_name_by_id($biz_id){
        $sql = "SELECT name FROM  `Business_Table` WHERE biz_id = ".$biz_id."";
        $biz_name = $this->query($sql);
        if ($biz_name === FALSE) {
            return NULL;
        } else {
            $row = $biz_name->fetch_row();
            return $row[0];
        }
    }
}

?>