<?php

class FArticleDescription{
    private static $instance = null;
    public static function getInstance(){
        if (!self::$instance){
            self::$instance = new self();
        }
        return self::$instance;
    }
    //END SINGLETON

    private static $table = "ArticleDescription";
    private static $value = "(:EAN, :name, :artist, :format)";
    private static $key = "EAN";
    private static $updatequery = "EAN = :EAN, name = :name, artist = :artist, format = :format";
    
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

    public static function bind($stmt, $articleDescription){
        $stmt->bindValue(':EAN', $articleDescription->getId(), PDO::PARAM_STR);
        $stmt->bindValue(':name', $articleDescription->getName(), PDO::PARAM_STR);
        $stmt->bindValue(':artist', $articleDescription->getArtist(), PDO::PARAM_STR);
        $stmt->bindValue(':format', $articleDescription->getFormat(),PDO::PARAM_INT);
    }
    
    //C
    public static function createObject ($obj){
        $saveArticle = FDB::getInstance()->create(self::class, $obj);
        if($saveArticle !== null){
            return true;
        }else{
            return false;
        }
    }

    // R
    public static function retrieveObject($id){
        $result = FDB::getInstance()->retrieve(self::getTable(), self::getKey(), $id);
        if(count($result) > 0){
            $obj = self::createEntity($result);
            return $obj;
        }else{
            return null;
        }

    }

    // U
    public static function updateObject($obj){
        $updateArticle = FDB::getInstance()->update(self::class, $obj);
        if($updateArticle !== null){
            return true;
        }else{
            return false;
        }
    }

    // D
    public static function deleteObject($obj){
        $deleteArticle = FDB::getInstance()->delete(self::class, $obj);
        if($deleteArticle !== null){
            return true;
        }else{
            return false;
        }
    }
    // END OF CRUD


    public static function createEntity($result){
        $obj = new EArticleDescription($result[0]['EAN'], $result[0]['name'], $result[0]['artist'], (int) $result[0]['format']);
        $obj->setStocks(FStock::getStocksByArticle($result[0]['EAN']));
        return $obj;
    }

    public static function getArticlesByArtist($artist){
        $queryResult = FDB::getInstance()->retrieve(self::getTable(), 'artist', $artist);
        $articles = array();
        for($i = 0; $i < count($queryResult); $i++){
            $article = self::retrieveObject($queryResult[$i][self::getKey()]);
            $articles[] = $article;
        }
        return $articles;
    }

    public static function verify($field, $id){
        $queryResult = FDB::getInstance()->retrieve(self::getTable(), $field, $id);
        return FDB::getInstance()->existInDb($queryResult);
    }

    public static function getByEAN($ean) {
        $queryResult = FDB::getInstance()->retrieve(self::getTable(), 'EAN', $ean);
        $article = self::retrieveObject($queryResult[0][self::getKey()]);     
        return $article;
    }
    public static function existEAN($ean){
        $queryResult = FDB::getInstance()->retrieve(self::getTable(), 'EAN', $ean);
        return FDB::getInstance()->existInDb($queryResult);
    }
}