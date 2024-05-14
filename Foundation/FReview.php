<?php

class FReview {
    private static $table = "Review";
    private static $value = "(:NULL, :customer, :reviewText, :articleRating, :sellerRating, :article, :seller)";
    private static $key = "id";

    private static $updatequery = "customer = :customer, reviewText = :reviewText, articleRating = :articleRating, sellerRating = :sellerRating, article = :article, seller = :seller";

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
    public static function bind($stmt, $Review){
        $stmt->bindValue(':customer', $Review->getCustomer()->getEmail(), PDO::PARAM_STR);
        $stmt->bindValue(':reviewText', $Review->getReviewText(), PDO::PARAM_STR);
        $stmt->bindValue(':articleRating', $Review->getArticleRating(), PDO::PARAM_INT);
        $stmt->bindValue(':sellerRating', $Review->getSellerRating(), PDO::PARAM_INT);
        $stmt->bindValue(':article', $Review->getArticle()->getEAN(), PDO::PARAM_STR);
        $stmt->bindValue(':seller', $Review->getSeller()->getEmail(), PDO::PARAM_STR);
    }

    //C
    public static function createObject($obj){
        $saveArticle = FDB::getInstance()->create(self::class, $obj);
        if($saveArticle !== null){
            $obj->setId($saveArticle);
            return true;
        }else{
            return false;
        }
    }
  
    //R
    public static function retrieveObject($id){
        $result = FDB::getInstance()->retrieve(self::getTable(), self::getKey(), $id);
        if(count($result) > 0){
            $obj = self::createObject($result);
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
        $obj = new EReview($result[0]['customer'], $result[0]['reviewText'], $result[0]['articleRating'], $result[0]['sellerRating'], $result[0]['article'], $result[0]['seller']);
        $obj->setId($result[0]['id']);
        return $obj;
    }
}