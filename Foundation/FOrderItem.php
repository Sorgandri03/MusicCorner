<?php

class FOrderItem{
    private static $instance = null;
    private function __construct(){}
    public static function getInstance(){
        if (!self::$instance){
            self::$instance = new self();
        }
        return self::$instance;
    }
    //END SINGLETON
    
    private static $table = "OrderItem";
    private static $value = "(NULL, :article, :seller, :quantity, :price, :orderID)";
    private static $key = "id";
    private static $updatequery = "article = :article, seller = :seller, quantity = :quantity, price = :price, orderID = :orderID";
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

    public static function bind($stmt, $orderItem){
        $stmt->bindValue(':article', $orderItem->getArticle(), PDO::PARAM_STR);
        $stmt->bindValue(':seller', $orderItem->getSeller(), PDO::PARAM_STR);
        $stmt->bindValue(':quantity', $orderItem->getQuantity(), PDO::PARAM_INT);
        $stmt->bindValue(':price', $orderItem->getPrice(), PDO::PARAM_STR);
        $stmt->bindValue(':orderID', $orderItem->getOrderId(), PDO::PARAM_INT);
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
        $obj = new EOrderItem($result[0]['article'], $result[0]['seller'], $result[0]['quantity'], $result[0]['price'], $result[0]['orderID']);
        $obj->setId($result[0]['id']);
        return $obj;
    }

    public static function getItemsbyOrder($order){
        $queryResult = FDB::getInstance()->retrieve(self::getTable(), 'orderID', $order);
        $items = array();
        for($i = 0; $i < count($queryResult); $i++){
            $item = self::retrieveObject($queryResult[$i][self::getKey()]);
            $items[] = $item;
        }
        return $items;
    }
    public static function getOrdersBySeller($seller){
        $queryResult = FDB::getInstance()->retrieve(self::getTable(), "seller", $seller);
        $orders = array();
        for($i = 0; $i < count($queryResult); $i++){
            $order = self::retrieveObject($queryResult[$i]['id']);
            $orders[] = $order;
        }
        return $orders;
    }
}