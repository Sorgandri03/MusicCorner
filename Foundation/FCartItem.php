<?php

class FCartItem{
    private static $table = "CartItem";
    private static $value = "(NULL, :article, :seller, :cartID, :quantity)";
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
        $stmt->bindValue(':article', $cartItem->getArticle(), PDO::PARAM_STR);
        $stmt->bindValue(':seller', $cartItem->getSeller(), PDO::PARAM_STR);
        $stmt->bindValue(':cartID', $cartItem->getCart()->getId(), PDO::PARAM_INT);
        $stmt->bindValue(':quantity', $cartItem->getQuantity(), PDO::PARAM_INT);
    }

    public static function saveObj($obj){
        $saveArticle = FDB::getInstance()->saveObject(self::class, $obj);
        if($saveArticle !== null){
            $obj->setId($saveArticle);
            return true;
        }else{
            return false;
        }
    }

    public static function getObj($id){
        $result = FDB::getInstance()->retriveObj(self::getTable(), self::getKey(), $id);
        if(count($result) > 0){
            $obj = self::createObj($result);
            return $obj;
        }else{
            return null;
        }

    }

    public static function createObj($result){
        $articleDescription = FArticleDescription::getObj($result[0]['article']);
        $cart = FCart::getObj($result[0]['cartID']);
        $seller = FSeller::getObj($result[0]['seller']);
        $obj = new ECartItem($articleDescription, $result[0]['quantity'], $cart, $seller);
        return $obj;
    }

    public static function getItemsbyCart($cart){
        $queryResult = FDB::getInstance()->retriveObj(self::getTable(), 'cartID', $cart);
        $items = array();
        if(count($queryResult) == 1){
            $result = self::getObj($queryResult[0][self::getKey()]);
            $item = self::createObj($result);
            $items[] = $item;
        }
        elseif(count($queryResult) > 1){
            for($i = 0; $i < count($queryResult); $i++){
                $result = self::getObj($queryResult[$i][self::getKey()]);
                $item = self::createObj($result);
                $items[] = $item;
            }
        }
        return $items;
    }
}