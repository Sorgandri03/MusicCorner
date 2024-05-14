<?php

class FAdmin{
    private static $table = "Admin";
    private static $value = "(:email)";
    private static $key = "email";
    public static function getValue(): string {
        return self::$value;
    }
    public static function getTable(): string {
        return self::$table;
    }
    public static function getKey(): string {
        return self::$key;
    }

    //C

    public static function bind($stmt, $admin){
        $stmt->bindValue(':email', $admin->getEmail(), PDO::PARAM_STR);
    }

    public static function saveObj($obj){
        $saveArticle = FDB::getInstance()->saveObject(self::class, $obj);
        if($saveArticle !== null){
            return true;
        }else{
            return false;
        }
    }

    //R

    public static function getObj($id){
        $result = FDB::getInstance()->retriveObj(self::getTable(), self::getKey(), $id);
        if(count($result) > 0){
            $obj = self::createObj($result);
            return $obj;
        }else{
            return null;
        }
    }

    public static function createObj($result){
        $obj = new EAdmin($result[0]['email'], $result[0]['password']);
        return $obj;
    }

    //U



    //D

}