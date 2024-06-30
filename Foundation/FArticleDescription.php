<?php
/**
 * This class manages the interactions with the ArticleDescription table in the database.
 * It includes CRUD operations and methods to verify and retrieve articles.
 */
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

    public static function bind($stmt, $articleDescription){
        $stmt->bindValue(':EAN', $articleDescription->getId(), PDO::PARAM_STR);
        $stmt->bindValue(':name', $articleDescription->getName(), PDO::PARAM_STR);
        $stmt->bindValue(':artist', $articleDescription->getArtist(), PDO::PARAM_STR);
        $stmt->bindValue(':format', $articleDescription->getFormat(),PDO::PARAM_INT);
    }
    
    /**
     * Create an article description in the database
     * @param $obj the article to create
     * @return bool succes/not success of the creation
     */
    public static function createObject ($obj){
        $saveArticle = FDB::getInstance()->create(self::class, $obj);
        if($saveArticle !== null){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Retrieve an article description from the database
     * @param $id the EAN of the article description
     * @return EArticleDescription|null the article description
     */
    public static function retrieveObject($id){
        $result = FDB::getInstance()->retrieve(self::getTable(), self::getKey(), $id);
        if(count($result) > 0){
            $obj = self::createEntity($result);
            return $obj;
        }else{
            return null;
        }

    }

    /**
     * Update an article description in the database
     * @param $obj the article description to update
     * @return bool succes/not success of the update
     */
    public static function updateObject($obj){
        $updateArticle = FDB::getInstance()->update(self::class, $obj);
        if($updateArticle !== null){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Delete the article description from the database
     * @param $obj the article description to delete
     * @return bool succes/not success of the deletion
     */
    public static function deleteObject($obj){
        $deleteArticle = FDB::getInstance()->delete(self::class, $obj);
        if($deleteArticle !== null){
            return true;
        }else{
            return false;
        }
    }
    // END OF CRUD

    /**
     * Create a EArticleDescription object from the result of a query
     * @param $result the result of the query
     * @return EArticleDescription the article object
     */
    public static function createEntity($result){
        $obj = new EArticleDescription($result[0]['EAN'], $result[0]['name'], $result[0]['artist'], (int) $result[0]['format']);
        $obj->setStocks(FStock::getStocksByArticle($result[0]['EAN']));
        $obj->setReviews(FReview::getReviewsByArticle($result[0]['EAN']));
        return $obj;
    }

    /**
     * Get all the article of an artist
     * @param $artist the artist to get the articles from
     * @return EArticleDescription[] array of EArticleDescription
     */
    public static function getArticlesByArtist($artist){
        $queryResult = FDB::getInstance()->retrieve(self::getTable(), 'artist', $artist);
        $articles = array();
        for($i = 0; $i < count($queryResult); $i++){
            $article = self::retrieveObject($queryResult[$i][self::getKey()]);
            $articles[] = $article;
        }
        return $articles;
    }

    /**
     * Verify if an article exists in the database
     * @param $field the field to verify
     * @param $id the id to verify for
     * @return bool the result of the verification
     */
    public static function verify($field, $id){
        $queryResult = FDB::getInstance()->retrieve(self::getTable(), $field, $id);
        return FDB::getInstance()->existInDb($queryResult);
    }

    /**
     * Verify if an article exists in the database
     * @param $ean the ean to verify
     * @return bool the result of the verification
     */
    public static function existEAN($ean){
        $queryResult = FDB::getInstance()->retrieve(self::getTable(), 'EAN', $ean);
        return FDB::getInstance()->existInDb($queryResult);
    }
}