<?php
/**
 * This class manages the interactions with the Admin table in the database.
 * It includes CRUD operations and methods to verify and retrieve admins.
 */
class FAdmin{
    private static $instance = null;
    public static function getInstance(){
        if (!self::$instance){
            self::$instance = new self();
        }
        return self::$instance;
    }
    //END SINGLETON
    private static $table = "Admin";
    private static $value = "(:email)";
    private static $key = "email";
    private static $updatequery = "email = :email";
    
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

    public static function bind($stmt, $admin){
        $stmt->bindValue(':email', $admin->getId(), PDO::PARAM_STR);
    }

    /**
     * Create an admin in the database
     * @param $obj
     * @return bool
     */
    public static function createObject ($obj){
        $saveArticle = FDB::getInstance()->create(self::class, $obj);
        $saveUser = FUser::saveUser($obj);
        if($saveArticle !== null){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Retrieve an admin from the database
     * @param $id the email of the admin
     * @return EAdmin|null the admin
     */
    public static function retrieveObject ($id){
        $result = FDB::getInstance()->retrieve(self::getTable(), self::getKey(), $id);
        if(count($result) > 0){
            $obj = self::createEntity($result);
            return $obj;
        }else{
            return null;
        }
    }

    /**
     * Update admin in the database
     * @param $obj the admin to update
     * @return bool succes/not success of the update
     */
    public static function updateObject($obj){
        $user = new EUser($obj->getId(), $obj->getPassword());
        $update = FUser::updateObject($user);
        if($update !== null){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Delete the admin from the database
     * @param $obj the admin to delete
     * @return bool succes/not success of the deletion
     */
    public static function deleteObject($obj){
        $deleteArticle = FDB::getInstance()->delete(self::class, $obj);
        $user = new EUser($obj->getId(), $obj->getPassword());
        $deleteUser = FUser::deleteObject($user);
        if($deleteArticle !== null && $deleteUser !== null){
            return true;
        }else{
            return false;
        }
    }
    // END OF CRUD

    /**
     * Create a EArticleDescription object from the result of a query
     * @param $result the result of the query
     * @return EAdmin the review
     */
    public static function createEntity($result){
        $user = FUser::retrieveObject($result[0]['email']);
        $admin = new EAdmin($result[0]['email'], $user->getPassword());
        return $admin;
    }

    /**
     * Verify if an admin exists in the database
     * @param $field the field to verify
     * @param $id the id to verify for
     * @return bool the result of the verification
     */
    public static function verify($field, $id){
        $queryResult = FDB::getInstance()->retrieve(self::getTable(), $field, $id);
        return FDB::getInstance()->existInDb($queryResult);
    }

}