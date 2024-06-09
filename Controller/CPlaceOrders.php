<?php

class CPlaceOrders{
    
    public static function addToCart(){
        $stockId = UHTTPMethods::post('stockId');
        $quantity = 1;
        /**
         * Retrieve user cart from the session
         */
        if(USession::getInstance()->isSetSessionElement('cart')){
            $cart = USession::getInstance()->getSessionElement('cart');
        }
        else{
            if(CUser::islogged()){
                $cart = new ECart(USession::getInstance()->getSessionElement('customer'));
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
        header('Location: /MusicCorner/');
    }
    
    public static function cart(){
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
    public static function order(){
        /**
         * Retrieve user cart from the session
         */
        if(USession::getInstance()->isSetSessionElement('cart')){
            $cart = unserialize(USession::getInstance()->getSessionElement('cart'));
        }
        else{
            $cart = new ECart(USession::getInstance()->isSetSessionElement('email'));
        }
        if(count($cart->getCartItems()) == 0){
            //CANT PLACE ORDER
            return;
        }

        /**
         * Retrieve customer
         */
        $customer = FPersistentManager::getInstance()->retrieveObj(ECustomer::class, USession::getInstance()->getSessionElement('email'));

        /**
         * Pass customer to the view
         */
        //CALL VIEW, PASS CUSTOMER
    }
    public static function orderConfirm(string $cardNumber, int $addressId){
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
