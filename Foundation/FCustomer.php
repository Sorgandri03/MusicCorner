<?php

class FCustomer {
    private static $table = "customer";
    public static $value = "(:username, :email, :password, NULL)";
    public static function getValue(): string {
        return self::$value;
    }
    public static function getTable(): string {
        return self::$table;
    }
    public static function getKey(): string {
        return "email";
    }

    public static function bind($stmt, $customer){
        $stmt->bindValue(':username', $customer->getUsername(), PDO::PARAM_STR);
        $stmt->bindValue(':email', $customer->getEmail(), PDO::PARAM_STR);
        $stmt->bindValue(':password', $customer->getPassword(), PDO::PARAM_STR);
    }

    public static function createCustomerObj($result){
        $customer = new ECustomer($result[0]['username'], $result[0]['email'], $result[0]['password']);
        return $customer;
    }

    public static function addCreditCards(ECustomer $owner){
        $owner->setCreditCards(FCreditCard::getCardsByOwner($owner->getEmail()));
    }

    public static function getObj($email){
        $result = FDB::getInstance()->retriveObj(self::getTable(), self::getKey(), $email);
        if(count($result) > 0){
            $customer = self::createCustomerObj($result);
            return $customer;
        }else{
            return null;
        }
    }

    public static function saveObj($customer){
        $saveCustomer = FDB::getInstance()->saveObject(self::class, $customer);
        if($saveCustomer !== null){
            return true;
        }else{
            return false;
        }
    }
}