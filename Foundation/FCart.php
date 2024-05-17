<?php

class FCart{
    private static $instance = null;
    public static function getInstance(){
        if (!self::$instance){
            self::$instance = new self();
        }
        return self::$instance;
    }
    //END SINGLETON
    private static $table = "Cart";
    private static $value = "(NULL, :customer)";
    private static $key = "id";
    private static $updatequery = "customer = :customer";
    public static function getValue(): string {
        return self::$value;
    }
    public static function getTable(): string {
        return self::$table;
    }
    public static function getKey(): string {
        return self::$key;
    }
    public static function getUpdateQuery(): string {
        return self::$updatequery;
    }

    public static function bind($stmt, $shoppingCart){
        $stmt->bindValue(':customer', $shoppingCart->getCustomer(), PDO::PARAM_STR);
    }

    //C

    public static function createObject($obj){
        $saveArticle = FDB::getInstance()->create(self::class, $obj);
        if($saveArticle !== null){
            $obj->setId($saveArticle);
            return true;
        }else{
            return false;
        }
    }
     //R
    public static function retrieveObject($id){
        $result = FDB::getInstance()->retrieve(self::getTable(), self::getKey(), $id);
        if(count($result) > 0){
            $obj = self::createEntity($result);
            return $obj;
        }else{
            return null;
        }

    }
    //U
    public static function updateObject($obj){
        $updateArticle = FDB::getInstance()->update(self::class, $obj);
        if($updateArticle !== null){
            return true;
        }else{
            return false;
        }
    }
    //D
    public static function deleteObject($obj){
        $deleteArticle = FDB::getInstance()->delete(self::class, $obj);
        foreach($obj->getCartItems() as $item){
            FCartItem::deleteObject($item);
        }
        if($deleteArticle !== null){
            return true;
        }else{
            return false;
        }
    }
    //END OF CRUD

    public static function createEntity($result){
        $obj = new ECart($result[0]['customer']);
        $obj->setId($result[0]['id']);
        $obj->setCartItems(FCartItem::getItemsbyCart($obj->getId()));
        return $obj;
    }
    
}