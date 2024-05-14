<?php

class FAdmin{
    private static $table = "Admin";
    private static $value = "(:email)";
    private static $key = "email";
    private static $updatequery = "email = :email";
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
    public static function bind($stmt, $admin){
        $stmt->bindValue(':email', $admin->getId(), PDO::PARAM_STR);
    }

    //C
    public static function createObject ($obj){
        $saveArticle = FDB::getInstance()->create(self::class, $obj);
        $saveUser = FUser::saveUser($obj);
        if($saveArticle !== null){
            return true;
        }else{
            return false;
        }
    }

    //R

    public static function retrieveObject ($id){
        $result = FDB::getInstance()->retrieve(self::getTable(), self::getKey(), $id);
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
    // END OF CRUD

    public static function createEntity($result){
        $user = FUser::retrieveObject($result[0]['email']);
        $obj = new EAdmin($result[0]['email'], $user->getPassword());
        return $obj;
    }

    
}