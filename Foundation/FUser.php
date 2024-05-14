<?php
class FUser{
    private static $table = "User";
    private static $value = "(:email, :password)";
    private static $key = "email";
    private static $updatequery = "email = :email, password = :password";
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

    public static function bind($stmt, $user){
        $stmt->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
        $stmt->bindValue(':password', $user->getPassword(), PDO::PARAM_STR);
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


    public static function createEntity($result){
        $obj = new EUser($result[0]['email'],$result[0]['password']);
        return $obj;
    }


    public static function saveCustomer($customer){
        $user = new EUser($customer->getEmail(), $customer->getPassword());
        return self::updateObject($user);
    }
}