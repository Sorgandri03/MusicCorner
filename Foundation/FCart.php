<?php

class FShoppingCart{
    private static $table = "shoppingcart";
    private static $value = "(NULL, :customer, :createdAt)";
    private static $key = "ID";
    public static function getValue(): string {
        return self::$value;
    }
    public static function getTable(): string {
        return self::$table;
    }
    public function getKey(): string {
        return self::$key;
    }

    public static function bind($stmt, $shoppingCart){
        $stmt->bindValue(':customer', $shoppingCart->getCustomer()->getEmail(), PDO::PARAM_STR);
        $stmt->bindValue(':createdAt', $shoppingCart->get(), PDO::PARAM_STR);
    }

    public static function saveObj($obj){
        $saveArticle = FDB::getInstance()->saveObject(self::class, $obj);
        if($saveArticle !== null){
            return true;
        }else{
            return false;
        }
    }

    public static function getItems(){
        
    }
    
    
}