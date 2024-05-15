<?php

class FCartItem{
    private static $instance = null;
    public static function getInstance(){
        if (!self::$instance){
            self::$instance = new self();
        }
        return self::$instance;
    }
    //END SINGLETON
    private static $table = "CartItem";
    private static $value = "(NULL, :cartID, :stockID, :quantity)";
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

    public static function bind($stmt, $cartItem){
        $stmt->bindValue(':cartID', $cartItem->getCart()->getId(), PDO::PARAM_INT);
        $stmt->bindValue(':stockID', $cartItem->getArticle()->getId(), PDO::PARAM_INT);
        $stmt->bindValue(':quantity', $cartItem->getQuantity(), PDO::PARAM_INT);
    }
// C
    public static function createObject($obj){
        $saveArticle = FDB::getInstance()->create(self::class, $obj);
        if($saveArticle !== null){
            $obj->setId($saveArticle);
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
//END OF CRUD 



    public static function createEntity($result){
        $article = FStock::retrieveObject($result[0]['stockID']);
        $cart = FCart::retrieveObject($result[0]['cartID']);
        $obj = new ECartItem($article, $result[0]['quantity'], $cart);
        return $obj;
    }

    public static function getItemsbyCart($cart){
        $queryResult = FDB::getInstance()->retrieve(self::getTable(), 'cartID', $cart);
        $items = array();
        if(count($queryResult) == 1){
            $result = self::retrieveObject($queryResult[0][self::getKey()]);
            $item = self::createEntity($result);
            $items[] = $item;
        }
        elseif(count($queryResult) > 1){
            for($i = 0; $i < count($queryResult); $i++){
                $result = self::retrieveObject($queryResult[$i][self::getKey()]);
                $item = self::createEntity($result);
                $items[] = $item;
            }
        }
        return $items;
    }
}