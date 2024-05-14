<?php

class FCreditCard{
    private static $table = "CreditCard";
    private static $value = "(:cardNumber, :billingAddress, :owner, :expiringDate, :cvv)";
    private static $key = "cardNumber";
    private static $updatequery = "billingAddress = :billingAddress, owner = :owner, expiringDate = :expiringDate, cvv = :cvv";
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

    public static function bind($stmt, $creditCard){
        $stmt->bindValue(':cardNumber', $creditCard->getNumber(), PDO::PARAM_STR);
        $stmt->bindValue(':billingAddress', $creditCard->getBillingAddress()->getId(), PDO::PARAM_INT);
        $stmt->bindValue(':owner', $creditCard->getOwner()->getEmail(), PDO::PARAM_STR);
        $stmt->bindValue(':expiringDate', $creditCard->getExpirationDate(), PDO::PARAM_STR);
        $stmt->bindValue(':cvv', $creditCard->getCvv(), PDO::PARAM_STR);
    }

    //C
    public static function createObject($obj){
        $saveArticle = FDB::getInstance()->create(self::class, $obj);
        if($saveArticle !== null){
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
        $owner = FCustomer::getObj($result[0]['owner']);
        $address = FAddress::getObj($result[0]['billingAddress']);
        $card = new ECreditCard($result[0]['cardNumber'], $result[0]['expiringDate'], $result[0]['cvv'], $owner, $address);
        return $card;
    }

    public static function getCardsByOwner($owner){
        $queryResult = FDB::getInstance()->retrieve(self::getTable(), 'owner', $owner);
        $cards = array();
        if(count($queryResult) == 1){
            $result = self::retrieveObject($queryResult[0][self::getKey()]);
            $card = self::createEntity($result);
            $cards[] = $card;
        }
        elseif(count($queryResult) > 1){
            for($i = 0; $i < count($queryResult); $i++){
                $result = self::retrieveObject($queryResult[$i][self::getKey()]);
                $card = self::createEntity($result);
                $cards[] = $card;
            }
        }
        return $cards;
    }
}