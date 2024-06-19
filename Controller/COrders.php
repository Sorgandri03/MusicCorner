<?php

class COrders{
    
    public static function addToCart(){
        $stockId = UHTTPMethods::post('stockId');
        if(UHTTPMethods::post('quantity')){
            $quantity = UHTTPMethods::post('quantity');
        }
        else{
            $quantity = 1;
        }
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
         * Go to cart page
         */
        header('Location: /MusicCorner/Orders/cart');
    }
    
    public static function cart(){
        /**
         * Show cart page
         */
        $v = new VOrders();
        $v->showCart();
    }

    public static function removeFromCart(){
        /**
         * Retrieve stockId from the post request
         */
        $stockId = UHTTPMethods::post('stockId');

        /**
         * Retrieve user cart from the session
         */
        if(USession::getInstance()->isSetSessionElement('cart')){
            $cart = USession::getInstance()->getSessionElement('cart');
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
        USession::getInstance()->setSessionElement('cart', $cart);

        /**
         * Go to cart page
         */
        header('Location: /MusicCorner/Orders/cart');
    }

    public static function updateCart(){
        /**
         * Retrieve stockId and quantity from the post request
         */
        $stockId = UHTTPMethods::post('stockId');
        $quantity = UHTTPMethods::post('quantity');

        /**
         * Retrieve user cart from the session
         */
        if(USession::getInstance()->isSetSessionElement('cart')){
            $cart = USession::getInstance()->getSessionElement('cart');
        }
        else{
            $cart = new ECart(USession::getInstance()->isSetSessionElement('email'));
        }

        /**
         * Update quantity of productId in the cart
         */
        $cart->updateArticle($stockId, $quantity);

        /**
         * Save cart in the session
         */
        USession::getInstance()->setSessionElement('cart', $cart);

        /**
         * Go to cart page
         */

        header('Location: /MusicCorner/Orders/cart');
    }

    public static function clearCart(){
        /**
         * Retrieve user cart from the session
         */
        if(USession::getInstance()->isSetSessionElement('cart')){
            $cart = USession::getInstance()->getSessionElement('cart');
        }
        else{
            $cart = new ECart(USession::getInstance()->isSetSessionElement('email'));
        }

        /**
         * Update quantity of productId in the cart
         */
        $cart->clearCart();

        /**
         * Save cart in the session
         */
        USession::getInstance()->setSessionElement('cart', $cart);

        /**
         * Go to cart page
         */

        header('Location: /MusicCorner/Orders/cart');
    }

    public static function order(){
        /**
         * Retrieve user cart from the session
         */
        if(USession::getInstance()->isSetSessionElement('cart')){
            $cart = USession::getInstance()->getSessionElement('cart');
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
