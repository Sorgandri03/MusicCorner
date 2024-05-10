<?php

class FOrder{
    private static $table = "Order";
    public static $value = "(NULL, :customer, :orderDateTime, :status, :price, :payment, :shipmentAddress, :cart)";
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

    public static function bind($stmt, $order){
        $stmt->bindValue(':customer', $order->getCustomer()->getEmail(), PDO::PARAM_STR);
        $stmt->bindValue(':orderDateTime', $order->getOrderDateTime(), PDO::PARAM_STR);
        $stmt->bindValue(':status', $order->getCity(), PDO::PARAM_STR);
        $stmt->bindValue(':price', $order->getName(), PDO::PARAM_STR);
        $stmt->bindValue(':payment', $order->getStreet(), PDO::PARAM_STR);
        $stmt->bindValue(':shipmentAddress', $order->getCap(), PDO::PARAM_INT);
        $stmt->bindValue(':cart', $order->getCity(), PDO::PARAM_INT);
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
        $payment = FCreditCard::getObj($result[0]['payment']);
        $shippingAddress = FAddress::getObj($result[0]['shipmentAddress']);
        $cart = FCart::getObj($result[0]['cart']);
        $obj = new EOrder($customer, $shippingAddress, $payment, $result[0]['status'], $result[0]['price'], $cart);
        $obj->setId($result[0]['id']);
        $obj->setOrderDateTime($result[0]['orderDateTime']);
        return $obj;
    }

}