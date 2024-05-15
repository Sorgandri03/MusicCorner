<?php

class FOrder{
    
    private static $instance = null;
    public static function getInstance(){
        if (!self::$instance){
            self::$instance = new self();
        }
        return self::$instance;
    }
    //END SINGLETON

    private static $table = "Orders";
    public static $value = "(NULL, :customer, :orderDateTime, NULL, :price, :payment, :shipmentAddress, :cart)";
    private static $key = "id";

    private static $updatequery = "customer = :customer, orderDateTime = :orderDateTime, price = :price, payment = :payment, shipmentAddress = :shipmentAddress, cart = :cart";

    public static function getTable(): string {
        return self::$table;
    }

    public static function getValue(): string {
        return self::$value;
    }

    public static function getKey(): string {
        return self::$key;
    }

    public static function getUpdateQuery(): string {
        return self::$updatequery;
    }
    

    public static function bind($stmt, $order){
        $stmt->bindValue(':customer', $order->getCustomer()->getID(), PDO::PARAM_STR);
        $stmt->bindValue(':orderDateTime', $order->getOrderDateTime()->format('Y-m-d H:i:s'), PDO::PARAM_STR);
        $stmt->bindValue(':price', (string) $order->getPrice(), PDO::PARAM_STR);
        $stmt->bindValue(':payment', $order->getPayment()->getNumber(), PDO::PARAM_STR);
        $stmt->bindValue(':shipmentAddress', $order->getShippingAddress()->getId(), PDO::PARAM_INT);
        $stmt->bindValue(':cart', $order->getCart()->getId(), PDO::PARAM_INT);
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
    //END CRUD

    public static function createEntity($result){
        $customer = FCustomer::retrieveObject($result[0]['customer']);
        $payment = FCreditCard::retrieveObject($result[0]['payment']);
        $shippingAddress = FAddress::retrieveObject($result[0]['shipmentAddress']);
        $cart = FCart::retrieveObject($result[0]['cart']);
        $obj = new EOrder($customer, $shippingAddress, $payment, $result[0]['price'], $cart);
        $obj->setId($result[0]['id']);
        $obj->setOrderDateTime(date_create_from_format('Y-m-d H:i:s', $result[0]['orderDateTime']));
        return $obj;
    }
}