<?php

class FCustomer {
    private static $table = "Customer";
    public static $value = "(:email, :username, :suspensionTime)";
    public static $key = "email";
    private static $updatequery = "username = :username, suspensionTime= :suspensionTime" ;
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


    public static function bind($stmt, $customer){
        $stmt->bindValue(':username', $customer->getUsername(), PDO::PARAM_STR);
        $stmt->bindValue(':email', $customer->getId(), PDO::PARAM_STR);
        $stmt->bindValue(':suspensionTime', $customer->getSuspensionTime(), PDO::PARAM_INT);
    }
    
    //C
    public static function createObject($obj){
        $saveCustomer = FDB::getInstance()->create(self::class, $obj);
        $saveUser = FUser::createObject(new EUser($obj->getId(), $obj->getPassword()));
        if($saveCustomer !== null && $saveUser !== null){
            return true;
        }else{
            return false;
        }
    }
    
    //R
    public static function retrieveObject($email){
        $result = FDB::getInstance()->retrieve(self::getTable(), self::getKey(), $email);
        if(count($result) > 0){
            $customer = self::createEntity($result);
            return $customer;
        }else{
            return null;
        }
    }
    
    //U
    public static function updateObject($obj){
        $update = FDB::getInstance()->update(self::class, $obj);
        $user = new EUser($obj->getId(), $obj->getPassword());
        $updateUser = FUser::updateObject($user);
        if($update !== null){
            return true;
        }else{
            return false;
        }
    }

    //D
    public static function deleteObject($obj){
        $delete = FDB::getInstance()->delete(self::class, $obj);
        if($delete !== null){
            return true;
        }else{
            return false;
        }
    }

    //END CRUD

    public static function createEntity($result){
        $user = FUser::retrieveObject($result[0]['email']);
        $customer = new ECustomer($result[0]['username'], $result[0]['email'], $user->getPassword());
        $customer->setCreditCards(FCreditCard::getCardsByOwner($customer->getId()));
        $customer->setAddresses(FAddress::getAddressesByCustomer($customer->getId()));
        return $customer;
    }

}