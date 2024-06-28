<?php

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

    public static function verifyEAN($ean){
        $result = FArticleDescription::verify('EAN', $ean);
        return $result;
    }

    public function getArticleByEAN($ean) {
        return FArticleDescription::getByEAN($ean);
    }
    
    public static function verifyUserEmail($email){
        $result = FUser::verify('email', $email);
        return $result;
    }

    public static function getEmailFromUsername($username){
        // Cerca l'username nei Customer e lo shopName nei Seller
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

    public static function verifyUserUsername($username){
        //in base all'utente verifico campi diversi xke user non ha il campo username
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
     * null 
     * customer
     * seller
     * admin
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
     * null 
     * customer
     * seller
     * admin
     * @param string $email
     * @return string
     */
    public static function checkUserType($email) : string{
        if(FCustomer::retrieveObject($email)) {return "customer";}
        elseif(FSeller::retrieveObject($email)) {return "seller";}
        elseif(FAdmin::retrieveObject($email)) {return "admin";}
        else {return null;}
    }

    public static function searchArticles($query){
        $results = FDB::getInstance()::searchArticles($query);
        $articles = array();
        foreach($results as $result){
            $article = FArticleDescription::retrieveObject($result['EAN']);
            $articles[] = $article;
        }
        return $articles;
    }

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

    public static function getArticlesByFormat($format){
        $results = FDB::getInstance()::getArticlesByFormat($format);
        $articles = array();
        foreach($results as $result){
            $article = FArticleDescription::retrieveObject($result['EAN']);
            $articles[] = $article;
        }
        return $articles;
    }

    public static function retrieveAll($entity){
        $class = "F" . substr($entity,1);
        $result = call_user_func([$class, "retrieveAllObjects"]);
        return $result;
    }

    public static function retrievePassword($email){
        $result = FDB::retrieve('user', 'email' ,$email);
        return $result[0]['password'];
    }

    public static function isOrderItemReviewed($orderItem){
        $reviews = FReview::getReviewsByOrderItem($orderItem);
        return FDB::getInstance()::existInDb($reviews);
    }
}


