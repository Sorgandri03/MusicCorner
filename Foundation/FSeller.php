<?php
/**
 * This class manages the interactions with the Seller table in the database.
 * It includes CRUD operations and methods to verify and retrieve sellers.
 */
class FSeller{

    private static $table = "Seller";
    private static $value = "(:email, :shopName)";
    private static $key = "email";

    private static $updatequery = "email = :email, shopName = :shopName";

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

    public static function bind($stmt, $Seller){
        $stmt->bindValue(':email', $Seller->getId(), PDO::PARAM_STR);
        $stmt->bindValue(':shopName', $Seller->getShopName(), PDO::PARAM_STR);
    }

    /**
     * Create a seller in the database
     * @param $obj the seller to create
     * @return bool succes/not success of the creation
     */
    public static function createObject($obj){
        $saveArticle = FDB::getInstance()->create(self::class, $obj);
        $saveUser = FUser::saveUser($obj);
        if($saveArticle !== null){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Retrieve a seller from the database
     * @param $id the email of the seller
     * @return ESeller|null the seller
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
     * Update a seller in the database
     * @param $obj the seller to update
     * @return bool succes/not success of the update
     */
     public static function updateObject($obj){
        $updateArticle = FDB::getInstance()->update(self::class, $obj);
        $user = new EUser($obj->getId(), $obj->getPassword());
        $updateUser = FUser::updateObject($user);
        if($updateArticle !== null && $updateUser !== null){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Delete the seller from the database
     * @param $obj the seller to delete
     * @return bool succes/not success of the deletion
     */
    public static function deleteObject($obj){
        $deleteArticle = FDB::getInstance()->delete(self::class, $obj);
        $user = new EUser($obj->getId(), $obj->getPassword());
        $deleteUser = FUser::deleteObject($user);
        foreach($obj->getStocks() as $stock){
            FStock::deleteObject($stock);
        }
        if($deleteArticle !== null && $deleteUser !== null){
            return true;
        }else{
            return false;
        }
    }

    //END CRUD

    /**
     * Create a ESeller object from the result of a query
     * @param $result the result of the query
     * @return ESeller the seller object
     */
    public static function createEntity($result){
        $user = FUser::retrieveObject($result[0]['email']);
        $seller = new ESeller($result[0]['email'], $user->getPassword(), $result[0]['shopName']);
        $seller->setStocks(FStock::getStocksBySeller($seller->getId()));
        $seller->setReviews(FReview::getReviewsBySeller($result[0]['email']));
        $seller->setRecentOrders(FOrderItem::getOrdersBySeller($result[0]['email']));
        return $seller;
    }

    /**
     * Verify if a seller exists in the database
     * @param $field the field to verify
     * @param $id the id to verify for
     * @return bool the result of the verification
     */
    public static function verify($field, $id){
        $queryResult = FDB::getInstance()->retrieve(self::getTable(), $field, $id);
        return FDB::getInstance()->existInDb($queryResult);
    }
   
}