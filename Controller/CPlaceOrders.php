<?php

class CPlaceOrders{
    public static function search(string $query){
        /**
        * Retrieve articles from query
        */
        $articles = FPersistentManager::getInstance()->searchArticles($query);
        foreach($articles as $article){
            echo $article->getName() . "<br>";
        }
        
        /**
        * Show search results page
        */
        //CALL VIEW, PASS ARTICLES
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
            $cart = USession::getInstance()->getSessionElement('cart');
        }
        else{
            if(CUser::islogged()){
                $cart = new ECart(USession::getInstance()->getSessionElement('email'));
            }
        }

        /**
         * Add productId to cart
         * If the product is already in the cart, increase the quantity
         */
        $cart->addArticle($stockId, $quantity);

        /**
         * Save cart in the session
         */
        USession::getInstance()->setSessionElement('cart', $cart);
        foreach($cart->getCartItems() as $item => $amount){
            echo $item . " ->  " . $amount . "<br>";
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
    public static function confirmOrder(string $cardNumber, int $addressId){
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
         * Check if the cart is empty
         */
        if(count($cart->getCartItems()) == 0){
            //GOTO CART PAGE
            return;
        }

        /**
         * Create order
         */
        $order = new EOrder(USession::getInstance()->getSessionElement('email'), $addressId, $cardNumber, $cart->getTotalPrice());

        /**
         * Save order in the database
         */
        FPersistentManager::getInstance()->createObj($order);

        /**
         * Add order items to the order
         */
        foreach($cart->getCartItems() as $item => $quantity){
            $stock = FPersistentManager::getInstance()->retrieveObj(EStock::class, $item);
            $orderItem = new EOrderItem($stock->getArticle(), $stock->getSeller(), $quantity, $stock->getPrice(), $order->getId());
            $stock->setQuantity($stock->getQuantity() - $quantity);
            FPersistentManager::getInstance()->createObj($orderItem);
        }

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
        echo "Order confirmed";
        //CALL VIEW, PASS ORDER
    }
}
