<?php

class FSeller{
    private static $table = "Seller";
    private static $value = "(:email, :shopName, :shopRating)";
    private static $key = "email";

    private static $updatequery = "email = :email, shopName = :shopName, shopRating = :shopRating";

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


    public static function bind($stmt, $Seller){
        $stmt->bindValue(':email', $Seller->getEmail(), PDO::PARAM_STR);
        $stmt->bindValue(':shopName', $Seller->getShopName(), PDO::PARAM_STR);
        $stmt->bindValue(':shopRating',(String) $Seller->getShopRating(), PDO::PARAM_STR);

    }

    //C
    public static function createObject($obj){
        $saveArticle = FDB::getInstance()->create(self::class, $obj);
        $saveUser = FUser::saveCustomer($obj);
        if($saveArticle !== null){
            return true;
        }else{
            return false;
        }
    }

    //R
    public static function retrieveObject($email){
        $result = FDB::getInstance()->retrieve(self::getTable(), self::getKey(), $email);
        if(count($result) > 0){
            $obj = self::createEntity($result);
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

    //END CRUD

    public static function createEntity($result){
        $user = FUser::getObj($result[0]['email']);
        $obj = new ESeller($result[0]['email'], $user->getPassword(), $result[0]['shopName']);
        return $obj;
    }

}