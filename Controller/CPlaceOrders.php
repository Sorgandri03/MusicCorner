<?php

include_once 'Entity\ECart.php';

class CPlaceOrders{
    public static function selectArticle(int $idArticle){
        /**
        * Retrieve article from idArticle
        */
        $article = FPersistentManager::getInstance()->retrieveObj(EArticleDescription::class, $idArticle);
        
        /**
        * Show article page
        */
        //CALL VIEW, PASS PRODUCT
    }
    public static function addToCart(int $stockId, int $quantity){
        $cookie	= 'cart';
    
        /**
        * Retrieve user cart from the session
        */
        if(isset($_SESSION[$cookie])){
            echo "true";
            $cart = unserialize($_SESSION[$cookie]);
        }
        else{
            $cart = new ECart("email");
        }

        if(count($cart->getCartItems())>0){
            foreach($cart->getCartItems() as $item){
                $article = FPersistentManager::getInstance()->retrieveObj(EStock::class, $item);
                echo $article->getArticle();
            }
        }
        else{
            echo 'Cart is empty' . "\n\n";
        }

        /*
        foreach($cart->getCartItems() as $article){
            if($article->getProduct()->getId() == $stockId){
                $article->setQuantity($article->getQuantity() + $quantity);
                USession::getInstance()->setSessionElement($cookie, $cart);
                return;
            }
        }
        */

        /**
        * Add productId to cart
        */
        $cart->addArticle($stockId, $quantity);
        
        /**
        * Save cart in the session
        */
        $c = serialize($cart);
        $_SESSION[$cookie] = $c;
        foreach($cart->getCartItems() as $item => $quantity){
            echo $item . "  " . $quantity;
            $article = FPersistentManager::getInstance()->retrieveObj(EStock::class, $item);
            echo $article->getArticle();
        }
        
        /**
        * Print confirmation message
        */
        //CALL VIEW, PASS STOCKID
    }

}
