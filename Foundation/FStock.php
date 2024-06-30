<?php
/**
 * This class manages the interactions with the Stock table in the database.
 * It includes CRUD operations and methods to verify and retrieve stocks.
 */
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

    public static function bind($stmt, $stock){
        $stmt->bindValue(':price', (String) $stock->getPrice(), PDO::PARAM_STR);
        $stmt->bindValue(':quantity', $stock->getQuantity(),PDO::PARAM_INT);
        $stmt->bindValue(':article', $stock->getArticle(), PDO::PARAM_STR);
        $stmt->bindValue(':seller', $stock->getSeller(), PDO::PARAM_STR);
    }

    /**
     * Create a stock in the database
     * @param $obj the stock to create
     * @return bool succes/not success of the creation
     */
    public static function createObject($obj){
        $saveArticle = FDB::getInstance()->create(self::class, $obj);
        if($saveArticle !== null){
            $obj->setId($saveArticle);
            return true;
        }else{
            return false;
        }
    }
    
    /**
     * Retrieve a stock from the database
     * @param $id the id of the stock
     * @return EStock|null the stock object
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
     * Update a stock in the database
     * @param $obj the stock to update
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
     * Delete the stock from the database
     * @param $obj the stock to delete
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

    /**
     * Create a EStock object from the result of a query
     * @param $result the result of the query
     * @return EStock the stock object
     */
    public static function createEntity($result){
        $obj = new EStock( $result[0]['article'], $result[0]['quantity'], $result[0]['price'], $result[0]['seller']);
        $obj->setId($result[0]['id']);
        return $obj;
    }

    /**
     * Get all the stocks of a seller
     * @param $seller the seller to get the stocks from
     * @return EStock[] the stocks of the seller
     */
    public static function getStocksBySeller($seller){
        $queryResult = FDB::getInstance()->retrieve(self::getTable(), 'seller', $seller);
        $stocks = array();
        for($i = 0; $i < count($queryResult); $i++){
            $stock = self::retrieveObject($queryResult[$i][self::getKey()]);
            $stocks[] = $stock;
        }
        return $stocks;
    }

    /**
     * Get all the stock of an artist
     * @param $article the article to get the stocks from
     * @return EStock[] the stocks of the artist
     */
    public static function getStocksByArticle($article){
        $queryResult = FDB::getInstance()->retrieve(self::getTable(), 'article', $article);
        $stocks = array();
        for($i = 0; $i < count($queryResult); $i++){
            $stock = self::retrieveObject($queryResult[$i][self::getKey()]);
            $stocks[] = $stock;
        }
        return $stocks;
    }
    
}