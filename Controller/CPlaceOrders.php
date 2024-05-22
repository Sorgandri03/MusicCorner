<?php

class CPlaceOrders{
    public static function selectArticle(int $articleId){
        /**
        * Retrieve article from idArticle
        */
        $article = FPersistentManager::getInstance()->retrieveObj(EArticleDescription::class, $articleId);
        
        /**
        * Show article page
        */
        //CALL VIEW, PASS PRODUCT
    }
    public static function addToCart(int $stockId, int $quantity){

        /**
         * Retrieve user cart from the session
         */
        if(USession::getInstance()->isSetSessionElement('cart')){
            $cart = unserialize(USession::getInstance()->getSessionElement('cart'));
        }
        else{
            $cart = new ECart(USession::getInstance()->isSetSessionElement('email'));
        }

        if(count($cart->getCartItems())>0){
            foreach($cart->getCartItems() as $item => $amount){
                echo $item . " ->  " . $amount . "\n";
            }
        }
        else{
            echo 'Cart is empty' . "\n\n";
        }
        echo "<br><br>";

        /**
         * Add productId to cart
         * If the product is already in the cart, increase the quantity
         */
        if(count($cart->getCartItems()) != 0){
            foreach($cart->getCartItems() as $article => $amount){
                if($article == $stockId){
                    $cart->addArticle($stockId, $amount + $quantity);
                    break;
                }
                else {
                    $cart->addArticle($stockId, $quantity);
                }
            }
        }
        else{
            $cart->addArticle($stockId, $quantity);
        }

        /**
         * Save cart in the session
         */
        USession::getInstance()->setSessionElement('cart', serialize($cart));
        foreach($cart->getCartItems() as $item => $amount){
            echo $item . " ->  " . $amount . "\n";
        }
        
        /**
         * Print confirmation message
         */
        //CALL VIEW, PASS STOCKID
    }

}
