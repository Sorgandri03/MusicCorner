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


    public static function verifyUserEmail($email){
        $result = FUser::verify('email', $email);
        return $result;
    }

    public static function verifyUserUsername($username){
        $result = FUser::verify('username', $username);
        return $result;
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
        $results = FDB::getInstance()::getRandomArticles($quantity);
        $articles = array();
        foreach($results as $result){
            $article = FArticleDescription::retrieveObject($result['EAN']);
            $articles[] = $article;
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
}


