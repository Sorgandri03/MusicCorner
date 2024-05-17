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
    public static $value = "(NULL, :customer, :orderDateTime, NULL, :price, :payment, :shippingAddress, :cart)";
    private static $key = "id";

    private static $updatequery = "customer = :customer, orderDateTime = :orderDateTime, price = :price, payment = :payment, shippingAddress = :shippingAddress, cart = :cart";

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
        $stmt->bindValue(':customer', $order->getCustomer(), PDO::PARAM_STR);
        $stmt->bindValue(':orderDateTime', $order->getOrderDateTime(), PDO::PARAM_STR);
        $stmt->bindValue(':price', (string) $order->getPrice(), PDO::PARAM_STR);
        $stmt->bindValue(':payment', $order->getPayment(), PDO::PARAM_STR);
        $stmt->bindValue(':shippingAddress', $order->getShippingAddress(), PDO::PARAM_INT);
        $stmt->bindValue(':cart', $order->getCart(), PDO::PARAM_INT);
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
        $deleteCart = FDB::getInstance()->delete(FCart::class, FCart::retrieveObject($obj->getCart()));
        if($deleteArticle !== null && $deleteCart !== null){
            return true;
        }else{
            return false;
        }
    }
    //END CRUD

    public static function createEntity($result){
        $obj = new EOrder($result[0]['customer'],$result[0]['shippingAddress'], $result[0]['payment'], $result[0]['price'], $result[0]['cart']);
        $obj->setId($result[0]['id']);
        $obj->setOrderDateTime(date_create_from_format('Y-m-d H:i:s', $result[0]['orderDateTime']));
        return $obj;
    }
    
    public static function getOrdersbyCustomer($customer){
        $queryResult = FDB::getInstance()->retrieve(self::getTable(), 'customer', $customer);
        $orders = array();
        for($i = 0; $i < count($queryResult); $i++){
            $order = self::retrieveObject($queryResult[$i][self::getKey()]);
            $orders[] = $order;
        }
        return $orders;
    }
}