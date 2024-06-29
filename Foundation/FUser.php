<?php
class FUser{
    private static $instance = null;
    public static function getInstance(){
        if (!self::$instance){
            self::$instance = new self();
        }
        return self::$instance;
    }
    //END SINGLETON
    private static $table = "User";
    private static $value = "(:email, :password)";
    private static $key = "email";
    private static $updatequery = "email = :email, password = :password";
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
    public static function bind($stmt, $user){
        $stmt->bindValue(':email', $user->getId(), PDO::PARAM_STR);
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

    //END CRUD


    public static function createEntity($result){
        $obj = new EUser($result[0]['email'],$result[0]['password']);
        return $obj;
    }


    public static function saveUser($user){
        $user = new EUser($user->getId(), $user->getPassword());
        return self::createObject($user);
    }

    public static function verify($field, $id){
        $queryResult = FDB::getInstance()->retrieve(self::getTable(), $field, $id);
        return FDB::getInstance()->existInDb($queryResult);
    }
}