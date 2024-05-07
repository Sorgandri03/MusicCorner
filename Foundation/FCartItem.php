<?php

class FCartItem{
    private static $table = "cartitem";
    public static $value = "(:article, :quantity, :cartID, :sellerID)";
    public static function getValue(): string {
        return self::$value;
    }
    public static function getTable(): string {
        return self::$table;
    }

    public static function bind($stmt, $cartItem){
        $stmt->bindValue(':article', $cartItem->getArticle(), PDO::PARAM_STR);
        $stmt->bindValue(':quantity', $cartItem->getQuantity(), PDO::PARAM_INT);
        $stmt->bindValue(':cartID', $cartItem->getCartID(), PDO::PARAM_STR);
        $stmt->bindValue(':sellerID', $cartItem->getSeller()->getEmail(), PDO::PARAM_STR);
    }

    public static function saveObj($obj){
        $saveArticle = FDB::getInstance()->saveObject(self::class, $obj);
        if($saveArticle !== null){
            return true;
        }else{
            return false;
        }
    }

    
    
    
}