<?php

class FAddress{
    private static $table = "Address";
    public static $value = "(NULL, :street, :cap, :city, :name, :customer)";
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

    //C

    public static function bind($stmt, $address){
        $stmt->bindValue(':street', $address->getStreet(), PDO::PARAM_STR);
        $stmt->bindValue(':cap', $address->getCap(), PDO::PARAM_STR);
        $stmt->bindValue(':city', $address->getCity(), PDO::PARAM_STR);
        $stmt->bindValue(':name', $address->getName(), PDO::PARAM_STR);
        $stmt->bindValue(':customer', $address->getCustomer()->getEmail(), PDO::PARAM_STR);
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

    //R

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
        $obj = new EAddress($result[0]['street'], $result[0]['city'], $result[0]['cap'], $result[0]['name'], $customer);
        $obj->setId($result[0]['id']);
        return $obj;
    }

    //U



    //D




    public static function getAddressesbyCustomer($customer){
        $result = FDB::getInstance()->retriveObj(self::getTable(), 'customer', $customer);
        if(count($result) > 0){
            $addresses = array();
            foreach($result as $address){
                $addresses[] = self::createObj($address);
            }
            return $addresses;
        }else{
            return array();
        }
    }

}