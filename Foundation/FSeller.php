<?php

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

    //C
    public static function createObject($obj){
        $saveArticle = FDB::getInstance()->create(self::class, $obj);
        $saveUser = FUser::saveUser($obj);
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
        $user = new EUser($obj->getId(), $obj->getPassword());
        $updateUser = FUser::updateObject($user);
        if($updateArticle !== null && $updateUser !== null){
            return true;
        }else{
            return false;
        }
    }

    //D
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

    public static function createEntity($result){
        $user = FUser::retrieveObject($result[0]['email']);
        $seller = new ESeller($result[0]['email'], $user->getPassword(), $result[0]['shopName']);
        $seller->setStocks(FStock::getStocksBySeller($seller->getId()));
        $seller->setReviews(FReview::getReviewsBySeller($result[0]['email']));
        return $seller;
    }

    public static function verify($field, $id){
        $queryResult = FDB::getInstance()->retrieve(self::getTable(), $field, $id);
        return FDB::getInstance()->existInDb($queryResult);
    }

}