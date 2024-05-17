<?php

class FCartItem{
    private static $instance = null;
    private function __construct(){}
    public static function getInstance(){
        if (!self::$instance){
            self::$instance = new self();
        }
        return self::$instance;
    }
    //END SINGLETON
    
    private static $table = "CartItem";
    private static $value = "(NULL, :cartID, :stockID, :quantity)";
    private static $key = "id";
    private static $updatequery = "cartID = :cartID, stockID = :stockID, quantity = :quantity";
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

    public static function bind($stmt, $cartItem){
        $stmt->bindValue(':cartID', $cartItem->getCart(), PDO::PARAM_INT);
        $stmt->bindValue(':stockID', $cartItem->getStock(), PDO::PARAM_INT);
        $stmt->bindValue(':quantity', $cartItem->getQuantity(), PDO::PARAM_INT);
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
        if($deleteArticle !== null){
            return true;
        }else{
            return false;
        }
    }

    //END OF CRUD


    public static function createEntity($result){
        $obj = new ECartItem($result[0]['stockID'], $result[0]['quantity'], $result[0]['cartID']);
        $obj->setId($result[0]['id']);
        return $obj;
    }

    public static function getItemsbyCart($cart){
        $queryResult = FDB::getInstance()->retrieve(self::getTable(), 'cartID', $cart);
        $items = array();
        for($i = 0; $i < count($queryResult); $i++){
            $item = self::retrieveObject($queryResult[$i][self::getKey()]);
            $items[] = $item;
        }
        return $items;
    }
}