<?php

class FCreditCard{
    private static $instance = null;
    public static function getInstance(){
        if (!self::$instance){
            self::$instance = new self();
        }
        return self::$instance;
    }
    //END SINGLETON

    private static $table = "CreditCard";
    private static $value = "(NULL, :cardNumber, :billingAddress, :owner, :customerId, :expiringDate, :cvv)";
    private static $key = "id";
    private static $updatequery = "cardNumber = :cardNumber, billingAddress = :billingAddress, owner = :owner, customerId = :customerId, expiringDate = :expiringDate, cvv = :cvv";
    /**
     * Return the fields of the table
     * @return string the fields of the table
     */
    public static function getValue(): string {
        return self::$value;
    }

    /**
     * Return the table name
     * @return string the table name
     */
    public static function getTable(): string {
        return self::$table;
    }
    /**
     * Return the key field of the table
     * @return string the table name
     */
    public static function getKey(): string {
        return self::$key;
    }
    /**
     * Return the update query
     * @return string the update query
     */
    public static function getUpdateQuery(): string {
        return self::$updatequery;
    }

    public static function bind($stmt, $creditCard){
        $stmt->bindValue(':cardNumber', $creditCard->getNumber(), PDO::PARAM_STR);
        $stmt->bindValue(':billingAddress', $creditCard->getBillingAddress(), PDO::PARAM_INT);
        $stmt->bindValue(':owner', $creditCard->getOwner(), PDO::PARAM_STR);
        $stmt->bindValue(':customerId', $creditCard->getCustomerId(), PDO::PARAM_STR);
        $stmt->bindValue(':expiringDate', $creditCard->getExpirationDate(), PDO::PARAM_STR);
        $stmt->bindValue(':cvv', $creditCard->getCvv(), PDO::PARAM_STR);
    }

    //C
    public static function createObject($obj){
        $create = FDB::getInstance()->create(self::class, $obj);
        if($create !== null){
            $obj->setId($create);
            return true;
        }else{
            return false;
        }
    }

    //R
    public static function retrieveObject($cardNumber){
        $result = FDB::getInstance()->retrieve(self::getTable(), self::getKey(), $cardNumber);
        if(count($result) > 0){
            $card = self::createEntity($result);
            return $card;
        }else{
            return null;
        }
    }

    //U
    public static function updateObject($obj){
        $update = FDB::getInstance()->update(self::class, $obj);
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
        $card = new ECreditCard($result[0]['cardNumber'], $result[0]['expiringDate'], $result[0]['cvv'], $result[0]['owner'], $result[0]['customerId'], $result[0]['billingAddress']);
        $card->setId($result[0][self::getKey()]);
        return $card;
    }

    public static function getCardsByCustomer($customerId){
        $queryResult = FDB::getInstance()->retrieve(self::getTable(), 'customerId', $customerId);
        $cards = array();
        for($i = 0; $i < count($queryResult); $i++){
            $card = self::retrieveObject($queryResult[$i][self::getKey()]);
            $cards[] = $card;
        }
        return $cards;
    }
}