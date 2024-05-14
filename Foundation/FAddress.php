<?php

class FAddress{
    private static $table = "Address";
    private static $value = "(NULL, :street, :cap, :city, :name, :customer)";
    private static $key = "id";
    private static $updatequery = "street = :street, cap = :cap, city = :city, name = :name, customer = :customer";

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

    //C

    public static function bind($stmt, $address){
        $stmt->bindValue(':street', $address->getStreet(), PDO::PARAM_STR);
        $stmt->bindValue(':cap', $address->getCap(), PDO::PARAM_STR);
        $stmt->bindValue(':city', $address->getCity(), PDO::PARAM_STR);
        $stmt->bindValue(':name', $address->getName(), PDO::PARAM_STR);
        $stmt->bindValue(':customer', $address->getCustomer()->getEmail(), PDO::PARAM_STR);
    }
     // C
    public static function createObject ($obj){
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
            $obj = self::createObject($result);
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
    // END OF CRUD

public static function createEntity($result){
        $customer = FCustomer::retrieveObject($result[0]['customer']);
        $obj = new EAddress($result[0]['street'], $result[0]['city'], $result[0]['cap'], $result[0]['name'], $customer);
        $obj->setId($result[0]['id']);
        return $obj;
    }

    public static function getAddressesbyCustomer($customer){
        $result = FDB::getInstance()->retrieve(self::getTable(), 'customer', $customer);
        if(count($result) > 0){
            $addresses = array();
            foreach($result as $address){
                $addresses[] = self::createEntity($address);
            }
            return $addresses;
        }else{
            return array();
        }
    }

}


    

    