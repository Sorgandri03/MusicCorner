<?php
/**
 * This class manages the interactions with the User table in the database.
 * It includes CRUD operations and methods to verify and retrieve users.
 */
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
        
    /**
     * Create a user in the database
     * @param $obj the user to create
     * @return bool succes/not success of the creation
     */
    public static function createObject($obj){
        $saveArticle = FDB::getInstance()->create(self::class, $obj);
        if($saveArticle !== null){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Retrieve an user from the database
     * @param $email the email of the user
     * @return EUser|null the user
     */
    public static function retrieveObject($email){
        $result = FDB::getInstance()->retrieve(self::getTable(), self::getKey(), $email);
        if(count($result) > 0){
            $obj = self::createEntity($result);
            return $obj;
        }else{
            return null;
        }
    }

    /**
     * Update an user in the database
     * @param $obj the user to update
     * @return bool succes/not success of the update
     */
    public static function updateObject($obj){
        $updateArticle = FDB::getInstance()->update(self::class, $obj);
        if($updateArticle !== null){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Delete the user from the database
     * @param $obj the user to delete
     * @return bool succes/not success of the deletion
     */
    public static function deleteObject($obj){
        $deleteArticle = FDB::getInstance()->delete(self::class, $obj);
        if($deleteArticle !== null){
            return true;
        }else{
            return false;
        }
    }
    //END CRUD

    /**
     * Create a EUser object from the result of a query
     * @param $result the result of the query
     * @return EUser the article object
     */
    public static function createEntity($result){
        $obj = new EUser($result[0]['email'],$result[0]['password']);
        return $obj;
    }

    /**
     * Create a EUser object 
     * @param $user the user to save
     * @return bool succes/not success of the creation
     */
    public static function saveUser($user){
        $user = new EUser($user->getId(), $user->getPassword());
        return self::createObject($user);
    }

    /**
     * Verify if a user exists in the database
     * @param $field the field to verify
     * @param $id the id to verify for
     * @return bool the result of the verification
     */
    public static function verify($field, $id){
        $queryResult = FDB::getInstance()->retrieve(self::getTable(), $field, $id);
        return FDB::getInstance()->existInDb($queryResult);
    }
}