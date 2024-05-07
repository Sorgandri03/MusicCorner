<?php

class FCreditCard{
    private static $table = "creditcard";
    public static $value = "(:cardNumber, :billingAddress, :ownerName, :expiringDate, :cvv)";
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

    public static function getObj($id){
        $result = FDB::getInstance()->retriveObj(self::getTable(), self::getKey(), $id);
        if(count($result) > 0){
            $user = self::createCardObj($result);
            return $user;
        }else{
            return null;
        }

    }

    public static function createCardObj($result){
        $card = new ECreditCard($result[0]['cardNumber'], $result[0]['billingAddress'], $result[0]['owner'], $result[0]['expiringDate'], $result[0]['cvv']);
        return $card;
    }

    public static function getAllCards($owner){
        $queryResult = FDB::getInstance()->retriveObj(self::getTable(), 'owner', $owner);

        $cards = array();

        if(count($queryResult) == 1){
            $card = self::getObj($queryResult[0][self::getKey()]);
            $cards[] = $card;
        }elseif(count($queryResult) > 1){
            for($i = 0; $i < count($queryResult); $i++){
                $card = self::getObj($queryResult[$i][self::getKey()]);
                $cards[] = $card;
            }
        }
        return $cards;
    }

    
    
    
}