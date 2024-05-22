<?php

class CPlaceOrders{
    public static function searchArticle(string $query){

    }
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
    public static function openCart(){
        /**
         * Retrieve user cart from the session
         */
        if(USession::getInstance()->isSetSessionElement('cart')){
            $cart = unserialize(USession::getInstance()->getSessionElement('cart'));
        }
        else{
            if(USession::getInstance()->isSetSessionElement('email')){
                $cart = new ECart(USession::getInstance()->getSessionElement('email'));
            }
            else{
                //GOTO LOGIN PAGE
            }
        }

        /**
         * Show cart page
         */
        //CALL VIEW, PASS CART
    }
    public static function removeFromCart(int $stockId){
        /**
         * Retrieve user cart from the session
         */
        if(USession::getInstance()->isSetSessionElement('cart')){
            $cart = unserialize(USession::getInstance()->getSessionElement('cart'));
        }
        else{
            $cart = new ECart(USession::getInstance()->isSetSessionElement('email'));
        }

        /**
         * Remove productId from cart
         */
        $cart->removeArticle($stockId);

        /**
         * Save cart in the session
         */
        USession::getInstance()->setSessionElement('cart', serialize($cart));

        /**
         * Show cart page
         */
        //CALL VIEW, PASS CART
    }
    public static function placeOrder(){

    }
    public static function confirmOrder(int $cardNumber, int $addressId){
        /**
         * Retrieve user cart from the session
         */
        if(USession::getInstance()->isSetSessionElement('cart')){
            $cart = unserialize(USession::getInstance()->getSessionElement('cart'));
        }
        else{
            $cart = new ECart(USession::getInstance()->isSetSessionElement('email'));
        }

        /**
         * Create order
         */
        $order = new EOrder($cart->getCartItems(), $cart->getTotalPrice(), $cart->getTotalPrice());

        /**
         * Save order in the database
         */
        FPersistentManager::getInstance()->storeObj($order);

        /**
         * Clear cart
         */
        $cart->clearCart();

        /**
         * Save cart in the session
         */
        USession::getInstance()->setSessionElement('cart', serialize($cart));

        /**
         * Show order confirmation page
         */
        //CALL VIEW, PASS ORDER
    }
}
