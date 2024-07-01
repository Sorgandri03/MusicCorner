<?php
/**
 * This class manages the interactions with the Review table in the database.
 * It includes CRUD operations and methods to verify and retrieve stocks.
 */
class FReview {
    private static $instance = null;
    public static function getInstance(){
        if (!self::$instance){
            self::$instance = new self();
        }
        return self::$instance;
    }
    //END SINGLETON

    private static $table = "Review";
    private static $value = "(NULL, :customer, :reviewText, :articleRating, :sellerRating, :article, :seller, :orderItemID, :answered)";
    private static $key = "id";
    private static $updatequery = "customer = :customer, reviewText = :reviewText, articleRating = :articleRating, sellerRating = :sellerRating, article = :article, seller = :seller, orderItemID = :orderItemID, answered = :answered";
    
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

    public static function bind($stmt, $Review){
        $stmt->bindValue(':customer', $Review->getCustomer(), PDO::PARAM_STR);
        $stmt->bindValue(':reviewText', $Review->getReviewText(), PDO::PARAM_STR);
        $stmt->bindValue(':articleRating', $Review->getArticleRating(), PDO::PARAM_INT);
        $stmt->bindValue(':sellerRating', $Review->getSellerRating(), PDO::PARAM_INT);
        $stmt->bindValue(':article', $Review->getArticle(), PDO::PARAM_STR);
        $stmt->bindValue(':seller', $Review->getSeller(), PDO::PARAM_STR);
        $stmt->bindValue(':orderItemID', $Review->getOrderItemID(), PDO::PARAM_INT);
        $stmt->bindValue(':answered', $Review->isAnswered(), PDO::PARAM_BOOL);
    }

    /**
     * Create a review in the database
     * @param $obj the review to create
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
     * Retrieve a review from the database
     * @param $id the EAN of the article description
     * @return EReview|null the review
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
     * Update a review in the database
     * @param $obj the review to update
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
     * Delete review from the database
     * @param $obj the review to delete
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

    //END CRUD

    /**
     * Create a EReview object from the result of a query
     * @param $result the result of the query
     * @return EReview the review
     */
    public static function createEntity($result){
        $obj = new EReview($result[0]['customer'], $result[0]['reviewText'], $result[0]['articleRating'], $result[0]['sellerRating'], $result[0]['article'], $result[0]['seller'], $result[0]['orderItemID']);
        $obj->setId($result[0]['id']);
        $obj->setAnswered($result[0]['answered']);
        return $obj;
    }

    /**
     * Get all the reviews for an article
     * @param $article the article to get the reviews from
     * @return EReview[] the reviews
     */
    public static function getReviewsByArticle($article){
        $queryResult = FDB::getInstance()->retrieve(self::getTable(), 'article', $article);
        $reviews = array();
        for($i = 0; $i < count($queryResult); $i++){
            $review = self::retrieveObject($queryResult[$i][self::getKey()]);
            $reviews[] = $review;
        }
        return $reviews;
    }

    /**
     * Get all the reviews for a seller
     * @param $seller the seller to get the reviews from
     * @return EReview[] the reviews
     */
    public static function getReviewsBySeller($seller){
        $queryResult = FDB::getInstance()->retrieve(self::getTable(), 'seller', $seller);
        $reviews = array();
        for($i = 0; $i < count($queryResult); $i++){
            $review = self::retrieveObject($queryResult[$i][self::getKey()]);
            $reviews[] = $review;
        }
        return $reviews;
    }

    /**
     * Get all the reviews for a customer
     * @param $customer the seller to get the reviews from
     * @return EReview[] the reviews
     */
    public static function getReviewsByCustomer($customer){
        $queryResult = FDB::getInstance()->retrieve(self::getTable(), 'customer', $customer);
        $reviews = array();
        for($i = 0; $i < count($queryResult); $i++){
            $review = self::retrieveObject($queryResult[$i][self::getKey()]);
            $reviews[] = $review;
        }
        return $reviews;
    }

    /**
     * Get all the reviews for a orderItem
     * @param int $orderItemID the ID of the orderItem to get the reviews from
     * @return EReview[] the reviews
     */
    public static function getReviewsByOrderItem($orderItemID){
        $queryResult = FDB::getInstance()->retrieve(self::getTable(), 'orderItemID', $orderItemID);
        $reviews = array();
        for($i = 0; $i < count($queryResult); $i++){
            $review = self::retrieveObject($queryResult[$i][self::getKey()]);
            $reviews[] = $review;
        }
        return $reviews;
    }
}