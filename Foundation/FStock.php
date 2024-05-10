<?php

class FStock{
    private static $table = "Stock";
    private static $value = "(NULL, :price, :quantity, :article, :seller)";
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

    public static function bind($stmt, $stock){
        $stmt->bindValue(':price', (String) $stock->getPrice(), PDO::PARAM_STR);
        $stmt->bindValue(':quantity', $stock->getQuantity(),PDO::PARAM_STR);
        $stmt->bindValue(':article', $stock->getArticle()->getEAN(), PDO::PARAM_STR);
        $stmt->bindValue(':seller', $stock->getSeller()->getEmail(), PDO::PARAM_STR);
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

    public static function getObj($id){
        $result = FDB::getInstance()->retriveObj(self::getTable(), self::getKey(), $id);
        if(count($result) > 0){
            $obj = self::createObj($result);
            return $obj;
        }else{
            return null;
        }

    }

    public static function createObj($result){
        $article = FArticleDescription::getObj($result[0]['article']);
        $seller = FSeller::getObj($result[0]['seller']);
        $obj = new EStock($article, $seller, $result[0]['quantity'], $result[0]['price']);
        $obj->setId($result[0]['id']);
        return $obj;
    }

    
}