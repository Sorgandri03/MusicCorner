<?php

class FCreditCard{
    private static $table = "creditcard";
    public static $value = "(:cardNumber, :owner, :expiringDate, :cvv, :addressID)";
    public static function getValue(): string {
        return self::$value;
    }
    public static function getTable(): string {
        return self::$table;
    }
    public static function getKey(): string {
        return "cardNumber";
    }

    public static function bind($stmt, $creditCard){
        $stmt->bindValue(':cardNumber', $creditCard->getNumber(), PDO::PARAM_STR);
        $stmt->bindValue(':billingAddress', $creditCard->getExpirationDate(), PDO::PARAM_STR);
        $stmt->bindValue(':owner', $creditCard->getOwner()->getEmail(), PDO::PARAM_STR);
        $stmt->bindValue(':expiringDate', $creditCard->getExpirationDate(), PDO::PARAM_STR);
        $stmt->bindValue(':cvv', $creditCard->getCvv(), PDO::PARAM_INT);
    }

    public static function saveObj($obj){
        $saveArticle = FDB::getInstance()->saveObject(self::class, $obj);
        if($saveArticle !== null){
            return true;
        }else{
            return false;
        }
    }

    public static function getObj($cardNumber){
        $result = FDB::getInstance()->retriveObj(self::getTable(), self::getKey(), $cardNumber);
        if(count($result) > 0){
            $card = self::createObj($result);
            return $card;
        }else{
            return null;
        }

    }

    public static function createObj($result){
        $owner = FCustomer::getObj($result[0]['owner']); 
        $card = new ECreditCard($result[0]['cardNumber'], $result[0]['expiringDate'], $result[0]['cvv'], $owner, $result[0]['billingAddress']);
        return $card;
    }

    public static function getCardsByOwner($owner){
        $queryResult = FDB::getInstance()->retriveObj(self::getTable(), 'owner', $owner);
        $cards = array();
        if(count($queryResult) == 1){
            $result = self::getObj($queryResult[0][self::getKey()]);
            $card = self::createObj($result);
            $cards[] = $card;
        }
        elseif(count($queryResult) > 1){
            for($i = 0; $i < count($queryResult); $i++){
                $result = self::getObj($queryResult[$i][self::getKey()]);
                $card = self::createObj($result);
                $cards[] = $card;
            }
        }
        return $cards;
    }

    
    
    
}