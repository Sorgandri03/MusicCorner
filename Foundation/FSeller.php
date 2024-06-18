<?php

class FSeller{
    private static $instance = null;
    public static function getInstance(){
        if (!self::$instance){
            self::$instance = new self();
        }
        return self::$instance;
    }
    //END SINGLETON
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
        $stmt->bindValue(':email', $Seller->getId(), PDO::PARAM_STR);
        $stmt->bindValue(':shopName', $Seller->getShopName(), PDO::PARAM_STR);
        $stmt->bindValue(':shopRating',(String) $Seller->getShopRating(), PDO::PARAM_STR);
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
            $obj->setShopRating($result[0]['shopRating']);
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
        $seller->setSentMessages(FMessage::getSentMessages($seller->getId()));
        $seller->setReceivedMessages(FMessage::getReceivedMessages($seller->getId()));
        return $seller;
    }

    public static function verify($field, $id){
        $queryResult = FDB::getInstance()->retrieve(self::getTable(), $field, $id);
        return FDB::getInstance()->existInDb($queryResult);
    }

}