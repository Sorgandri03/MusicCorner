<?php

class FShoppingCart{
    private static $table = "Cart";
    private static $value = "(NULL, :customer)";
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

    public static function bind($stmt, $shoppingCart){
        $stmt->bindValue(':customer', $shoppingCart->getCustomer()->getEmail(), PDO::PARAM_STR);
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
        $customer = FCustomer::getObj($result[0]['customer']);
        $obj = new ECart($customer);
        return $obj;
    }

    public static function getCartItems() : array {
        return [];
    }
    
    
}