<?php

class FCustomer {
    
    private static $table = "Customer";
    public static $value = "(:email, :username, :suspensionTime)";
    public static $key = "email";
    private static $updatequery = "email = :email, username = :username, suspensionTime= :suspensionTime" ;
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
        if($update !== null && $updateUser !== null){
            return true;
        }else{
            return false;
        }
    }

    //D
    public static function deleteObject($obj){
        $delete = FDB::getInstance()->delete(self::class, $obj);
        $user = new EUser($obj->getId(), $obj->getPassword());
        $deleteUser = FUser::deleteObject($user);
        foreach($obj->getCreditCards() as $card){
            FCreditCard::deleteObject($card);
        }
        foreach($obj->getAddresses() as $address){
            FAddress::deleteObject($address);
        }
        if($delete !== null && $deleteUser !== null){
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
        $customer->setOrders(FOrder::getOrdersByCustomer($customer->getId()));
        return $customer;
    }

    public static function retrieveAllObjects(){
        $queryResult = FDB::getInstance()->retrieveEntries(self::getTable());
        $customers = array();
        for($i = 0; $i < count($queryResult); $i++){
            $customer = self::retrieveObject($queryResult[$i][self::getKey()]);
            $customers[] = $customer;
        }
        return $customers;
    }
}