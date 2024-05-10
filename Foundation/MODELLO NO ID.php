<?php

class FObj{
    private static $table = "";
    private static $value = "";
    private static $key = "";
    public static function getValue(): string {
        return self::$value;
    }
    public static function getTable(): string {
        return self::$table;
    }
    public static function getKey(): string {
        return "";
    }
    public static function getKey(): string {
        return self::$key;
    }

    public static function bind($stmt, $obj){
        $stmt->bindValue(':', $obj->(), PDO::PARAM_STR);
        $stmt->bindValue(':', $obj->(), PDO::PARAM_STR);
        $stmt->bindValue(':', $obj->(), PDO::PARAM_STR);
        $stmt->bindValue(':', $obj->(), PDO::PARAM_STR);
        $stmt->bindValue(':', $obj->(), PDO::PARAM_INT);
    }

    public static function saveObj($obj){
        $saveArticle = FDB::getInstance()->saveObject(self::class, $obj);
        if($saveArticle !== null){
            return true;
        }else{
            return false;
        }
    }

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
        $entity2 = FCustomer::getObj($result[0]['entity2']);
        $obj = new EEntity();
        return $obj;
    }

}