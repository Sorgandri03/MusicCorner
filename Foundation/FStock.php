<?php

class FStock{
    private static $instance = null;
    public static function getInstance(){
        if (!self::$instance){
            self::$instance = new self();
        }
        return self::$instance;
    }
    //END SINGLETON
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
        $stmt->bindValue(':article', $stock->getArticle(), PDO::PARAM_STR);
        $stmt->bindValue(':seller', $stock->getSeller()->getId(), PDO::PARAM_STR);
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
        $obj = new EStock( $result[0]['article'], $result[0]['quantity'], $result[0]['price'], $result[0]['seller']);
        $obj->setId($result[0]['id']);
        return $obj;
    }

    public static function getStocksBySeller($seller){
        $queryResult = FDB::getInstance()->retrieve(self::getTable(), 'seller', $seller);
        $stocks = array();
        for($i = 0; $i < count($queryResult); $i++){
            $stock = self::retrieveObject($queryResult[$i][self::getKey()]);
            $stocks[] = $stock;
        }
        return $stocks;
    }

    
}