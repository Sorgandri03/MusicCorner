<?php


class FDB {
    private static $instance = null;

    private $DB_NAME = "musiccorner";
    private $DB_HOST = "localhost";
    private $DB_USER = "root";
    private $DB_PASS = "";
    private static $db;
    private function __construct(){
        try{
            self::$db = new PDO("mysql:host=$this->DB_HOST;dbname=$this->DB_NAME", $this->DB_USER, $this->DB_PASS);
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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

    /*public function query($sql){
        return $this->db->query($sql);
    }
    
    public function create(Object $object){
        $values = $object->getValues();
        $query = "INSERT INTO ".$object->getTable()." VALUES ($values)";
        $this->query($query);
    }*/

    public static function saveObject($foundClass, $obj)
    {
        try{
            $query = "INSERT INTO " . $foundClass::getTable() . " VALUES " . $foundClass::getValue();
            $stmt = self::$db->prepare($query);
            $foundClass::bind($stmt, $obj);
            $stmt->execute();
            $id = self::$db->lastInsertId();
            return $id;
        }catch(Exception $e){
            echo "ERROR: " . $e->getMessage();
            return null;
        }
    }

}