<?php


class FDB {
    private static $instance = null;

    private $DB_NAME = "musiccorner";
    private $DB_HOST = "localhost";
    private $DB_USER = "root";
    private $DB_PASS = "";
    private $db;
    private function __construct(){
        try{
            $this->db = new PDO("mysql:host=$this->DB_HOST;dbname=$this->DB_NAME", $this->DB_USER, $this->DB_PASS);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        }catch(PDOException $e){
            echo "ERROR". $e->getMessage();
            die;
        }

    }

    public static function getinstance() {
        if(self::$instance == null){
            $c = __CLASS__;
            self::$instance = new $c;
        }
        return self::$instance;
    }

    //END SINGLETON

    public function query($sql){
        return $this->db->query($sql);
    }
    
    public function create(Object $object){
        $values = $object->getValues();
        $query = "INSERT INTO ".$object->getTable()." VALUES ($values)";
        $this->query($query);
    }

}