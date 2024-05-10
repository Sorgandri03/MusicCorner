<?php

class FAddress{
    private static $table = "Address";
    public static $value = "(NULL, :street, :cap, :city, :name)";
    private static $key = "id";
    public static function getValue(): string {
        return self::$value;
    }
    public static function getTable(): string {
        return self::$table;
    }
    public static function getKey(): string {
        return self::$key;
    }

    public static function bind($stmt, $address){
        $stmt->bindValue(':street', $address->getStreet(), PDO::PARAM_STR);
        $stmt->bindValue(':cap', $address->getCap(), PDO::PARAM_STR);
        $stmt->bindValue(':city', $address->getCity(), PDO::PARAM_STR);
        $stmt->bindValue(':name', $address->getName(), PDO::PARAM_STR);
    }

    public static function saveObj($obj){
        $saveArticle = FDB::getInstance()->saveObject(self::class, $obj);
        if($saveArticle !== null){
            $obj->setId($saveArticle);
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
        $obj = new EAddress($result[0]['street'], $result[0]['city'], $result[0]['cap'], $result[0]['name']);
        $obj->setId($result[0]['id']);
        return $obj;
    }

}