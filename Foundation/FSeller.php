<?php

class FSeller{
    private static $table = "Seller";
    private static $value = "(:email, :shopName, :shopRating)";
    private static $key = "email";
    public static function getValue(): string {

        return self::$value;
    }
    public static function getTable(): string {
        return self::$table;
    }
    public static function getKey(): string {
        return self::$key;
    }

    public static function bind($stmt, $Seller){
        $stmt->bindValue(':email', $Seller->getEmail(), PDO::PARAM_STR);
        $stmt->bindValue(':shopName', $Seller->getShopName(), PDO::PARAM_STR);
        $stmt->bindValue(':shopRating',(String) $Seller->getShopRating(), PDO::PARAM_STR);

    }

    public static function saveObj($obj){
        $saveArticle = FDB::getInstance()->saveObject(self::class, $obj);
        $saveUser = FUser::saveCustomer($obj);
        if($saveArticle !== null){
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
        $user = FUser::getObj($result[0]['email']);
        $obj = new ESeller($result[0]['email'], $user->getPassword(), $result[0]['shopName']);
        return $obj;
    }

}