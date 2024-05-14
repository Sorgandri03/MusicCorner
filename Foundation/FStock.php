<?php

class FStock{
    private static $table = "Stock";
    private static $value = "(NULL, :price, :quantity, :article, :seller)";
    private static $key = "id";
    private static $updatequery = "price = :price, quantity = :quantity, article = :article, seller = :seller";
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

    public static function bind($stmt, $stock){
        $stmt->bindValue(':price', (String) $stock->getPrice(), PDO::PARAM_STR);
        $stmt->bindValue(':quantity', $stock->getQuantity(),PDO::PARAM_STR);
        $stmt->bindValue(':article', $stock->getArticle()->getEAN(), PDO::PARAM_STR);
        $stmt->bindValue(':seller', $stock->getSeller()->getEmail(), PDO::PARAM_STR);
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

    public static function retieveObject($id){
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


    public static function createEntity($result){
        $article = FArticleDescription::retrieveObject($result[0]['article']);
        $seller = FSeller::retieveObject($result[0]['seller']);
        $obj = new EStock($article, $result[0]['quantity'], $result[0]['price']);
        $seller->addStock($obj);
        $obj->setId($result[0]['id']);
        return $obj;
    }

    
}