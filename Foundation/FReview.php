<?php

class FReview {
    private static $table = "Review";
    private static $value = "(:NULL,:customer, :reviewText, :articleRating, :sellerRating, :article, :seller)";
    private static $key = "id";

    public static function getValue(): string {
        return self::$value;
    }
    public static function getTable(): string {
        return self::$table;
    }
    public static function getKey(): string {
        return self::$key;
    }
    public static function bind($stmt, $Review){
        $stmt->bindValue(':customer', $Review->getCustomer()->getEmail(), PDO::PARAM_STR);
        $stmt->bindValue(':reviewText', $Review->getReviewText(), PDO::PARAM_STR);
        $stmt->bindValue(':articleRating', $Review->getArticleRating(), PDO::PARAM_INT);
        $stmt->bindValue(':sellerRating', $Review->getSellerRating(), PDO::PARAM_INT);
        $stmt->bindValue(':article', $Review->getArticle()->getEAN(), PDO::PARAM_STR);
        $stmt->bindValue(':seller', $Review->getSeller()->getEmail(), PDO::PARAM_STR);
    }

    public static function saveObj($obj){
        $saveArticle = FDB::getInstance()->saveObject(self::class, $obj);
        if($saveArticle !== null){
            $obj->setId($saveArticle);
            return true;
        }else{
            return false;
        }
    }
    public static function createObj($result){
        $obj = new EReview($result[0]['customer'], $result[0]['reviewText'], $result[0]['articleRating'], $result[0]['sellerRating'], $result[0]['article'], $result[0]['seller']);
        $obj->setId($result[0]['id']);
        return $obj;
    }
        
    
    public static function getObj($id){
        $result = FDB::getInstance()->retriveObj(self::getTable(), self::getKey(), $id);
        if(count($result) > 0){
            $obj = self::createObj($result);
            return $obj;
        }else{
            return null;
        }
        
    }
    
}