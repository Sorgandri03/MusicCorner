<?php
/**
 * This class manages the persistent storage and retrieval of objects in the database by using the Foundation classes.
 * It includes CRUD operations and various utility methods for verification and retrieval.
 * Acts as an intermediary between the database layer classes and the control layer classes. 
 * Provides methods to create, retrieve, update, and delete objects using corresponding Foundation classes.
 */
class FPersistentManager{

    private static $instance = null;

    public static function getInstance(){
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    //END SINGLETON

    /**
     * Save an object on the database
     * @param object $obj
     * @return bool
     */
    public static function createObj($obj){
        $class = "F" . substr(get_class($obj), 1);
        $result = call_user_func([$class, "createObject"], $obj);
        return $result;
    }

    /**
     * Retrieve an object from the database
     * @param string $entity
     * @param string|int $id
     * @return object
     */
    public function retrieveObj($entity, $id){
        $class = "F" . substr($entity,1);
        $result = call_user_func([$class, "retrieveObject"], $id);
        return $result;
    }

    /**
     * Update an object on the database
     * @param object $obj
     * @return bool
     */
    public function updateObj($obj){
        $class = "F" . substr(get_class($obj), 1);
        $result = call_user_func([$class, "updateObject"], $obj);
        return $result;
    }

    /**
     * Delete an object from the database
     * @param object $obj
     * @return bool
     */
    public function deleteObj($obj){
        $class = "F" . substr(get_class($obj), 1);
        $result = call_user_func([$class, "deleteObject"], $obj);
        return $result;
    }

    //END CRUD
    /** 
     * Check if the EAN is already in the database
     * @param string $ean ean to verify
     * @return bool the result of the verification
     */
    public static function verifyEAN($ean){
        $result = FArticleDescription::verify('EAN', $ean);
        return $result;
    }

    /** 
     * Check if the email is already in the database
     * @param string $email email to verify
     * @return bool the result of the verification
     */
    public static function verifyUserEmail($email){
        $result = FUser::verify('email', $email);
        return $result;
    }

    /** 
     * Get the email from the username in case of customer or from the shopName in case of seller
     * @param string $username username to verify
     * @return string|null the result of the verification
     */
    public static function getEmailFromUsername($username){
        $tables = ['Customer', 'Seller'];
        foreach ($tables as $table) {
            if ($table == 'Customer') {
                $queryResult = FDB::getInstance()->retrieve($table, 'username', $username);
            } else if ($table == 'Seller') {
                $queryResult = FDB::getInstance()->retrieve($table, 'shopName', $username);
            }
            if (FDB::getInstance()->existInDb($queryResult)) {
                return $queryResult['email'];
            }
        }
        return null;
    }

    /** 
     * Check if the username is already in the database
     * @param string $username email to verify
     * @return bool the result of the verification
     */
    public static function verifyUserUsername($username){
        $email=self::getEmailFromUsername($username);
        switch(self::checkUserTypeRegistration($email)){
            case "customer":
                return FCustomer::verify('username', $username);                   
            case "seller":
                return FSeller::verify('shopName', $username);
            case "disponibile":
                return false;
        }  
        return false;
    }


    /**
     * Check the type of user and if no email is matched it means that the email is available
     * customer
     * seller
     * disponibile
     * @param string $email
     * @return string
     */
    public static function checkUserTypeRegistration($email) : string{
        if(FCustomer::verify('email', $email)) {return "customer";}
        elseif(FSeller::verify('email', $email)) {return "seller";}
        else {return "disponibile";}
    }

    /**
     * Check the type of user
     * @param string $email
     * @return null|string customer | seller | admin
     */
    public static function checkUserType($email) : string{
        if(FCustomer::retrieveObject($email)) {return "customer";}
        elseif(FSeller::retrieveObject($email)) {return "seller";}
        elseif(FAdmin::retrieveObject($email)) {return "admin";}
        else {return null;}
    }

    /**
     * Search for articles in the database
     * @param string $query the query to search
     * @return EArticleDescription[]|null the articles found
     */
    public static function searchArticles($query){
        $results = FDB::getInstance()::searchArticles($query);
        $articles = array();
        foreach($results as $result){
            $article = FArticleDescription::retrieveObject($result['EAN']);
            $articles[] = $article;
        }
        return $articles;
    }
    /**
     * Get random articles from the database
     * @param int $quantity the quantity of random articles to get
     * @return EArticleDescription[]|null the articles found
     */
    public static function getRandomArticles($quantity){
        $results = FDB::getInstance()::getRandomArticles();
        $articles = array();
        foreach($results as $result){
            $article = FArticleDescription::retrieveObject($result['EAN']);
            if($article->isInStock() == false){
                continue;
            }
            $articles[] = $article;
            if(count($articles) == $quantity){
                break;
            }
        }
        return $articles;
    }

    /**
     * Get articles by format from the database
     * @param string $format the format of the articles to get
     * @return EArticleDescription[]|null the articles found
     */
    public static function getArticlesByFormat($format){
        $results = FDB::getInstance()::getArticlesByFormat($format);
        $articles = array();
        foreach($results as $result){
            $article = FArticleDescription::retrieveObject($result['EAN']);
            $articles[] = $article;
        }
        return $articles;
    }

    /**
     * Get all the entries from the database of the specified entity
     * @param string $entity the entity to retrieve
     * @return array the articles found
     */
    public static function retrieveAll($entity){
        $class = "F" . substr($entity,1);
        $queryResult = FDB::getInstance()->retrieve($class::getTable(),1,1);
        $items = array();
        for($i = 0; $i < count($queryResult); $i++){
            $item = call_user_func([$class, "retrieveObject"], $queryResult[$i][$class::getKey()]);
            $items[] = $item;
        }
        return $items;
    }

    /**
     * Retreive the password relative to the email
     * @param string $email the email to retrieve the password
     * @return string the password
     */
    public static function retrievePassword($email){
        $result = FDB::retrieve('User', 'email' ,$email);
        return $result[0]['password'];
    }

    /**
     * Verify if an order item is reviewed
     * @param int $orderItem the order item to verify A
     * @return bool the result of the verification
     */
    public static function isOrderItemReviewed($orderItem){
        $reviews = FReview::getReviewsByOrderItem($orderItem);
        return FDB::getInstance()::existInDb($reviews);
    }

    /**
     * Locks the stocks table
     * @return bool true if the lock and transaction were successful, false otherwise
     */
    public static function lockStockAndOrder(){
        return FDB::getInstance()->lockStockAndOrder();
    }

    /**
     * Commits the new stock to the stocks table
     * @param EStock $stock the new stock to commit
     * @return bool true if the commit was successful, false otherwise
     */
    public static function commitStock($stock){
        return FDB::getInstance()->commitStock($stock);
    }

    /**
     * Unlocks the stocks table
     * @return bool true if the unlock and commit were successful, false otherwise
     */
    public static function unlockStockAndOrder(){
        return FDB::getInstance()->unlockStockAndOrder();
    }

    /**
     * Verify if an OrderItem is already reviewed
     * @param int $orderItemID the OrderItem to verify
     */
    public static function verifyReviewByOrderItem($orderItemID){
        $reviews = FReview::getReviewsByOrderItem($orderItemID);
        return FDB::getInstance()::existInDb($reviews);
    }
}


