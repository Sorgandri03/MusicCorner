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

        echo $stockId;
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

    public static function checkout(){
        if(!CUser::islogged()){
            header('Location: /MusicCorner/User/login');
            return;            
        }
        
        /**
         * Retrieve user cart from the session
         */
        if(USession::getInstance()->isSetSessionElement('cart')){
            $cart = USession::getInstance()->getSessionElement('cart');
        }
        else{
            $cart = new ECart('guest');
            USession::getInstance()->setSessionElement('cart',$cart);
        }
        
        /**
         * Pass customer to the view
         */
        $v = new VOrders();
        $v->showOrderAddress();
    }

    public static function payment(){
        if(!CUser::islogged()){
            header('Location: /MusicCorner/User/login');
            return;            
        }
        
        /**
         * Retrieve user cart from the session
         */
        if(USession::getInstance()->isSetSessionElement('cart')){
            $cart = USession::getInstance()->getSessionElement('cart');
        }
        else{
            $cart = new ECart(USession::getInstance()->getSessionElement('customer'));
        }

        /**
         * Check if the cart is empty
         */
        if(count($cart->getCartItems()) == 0){
            header('Location: /MusicCorner/Orders/cart');
            return;
        }

        $address = new EAddress(UHTTPMethods::post('address'), UHTTPMethods::post('city'), UHTTPMethods::post('zip-code'), UHTTPMethods::post('first-name')." ".UHTTPMethods::post('last-name'), USession::getInstance()->getSessionElement('customer')->getId());
        FPersistentManager::getInstance()->createObj($address);
        USession::getInstance()->setSessionElement('address', $address);

        $v = new VOrders();
        $v->showOrderPayment();
    }
    
    public static function orderConfirm(){
        if(!CUser::islogged()){
            header('Location: /MusicCorner/User/login');
            return;            
        }
        if(USession::getInstance()->isSetSessionElement('seller') || USession::getInstance()->isSetSessionElement('admin')){
            CUser::logout();
            return;
        }
        
        /**
         * Retrieve user cart from the session
         */
        if(USession::getInstance()->isSetSessionElement('cart')){
            $cart = USession::getInstance()->getSessionElement('cart');
        }
        else{
            $cart = new ECart(USession::getInstance()->getSessionElement('customer'));
        }

        /**
         * Check if the cart is empty
         */
        if(count($cart->getCartItems()) == 0){
            header('Location: /MusicCorner/Orders/cart');
            return;
        }

        /**
         * Retrieve address
         */
        $address = USession::getInstance()->getSessionElement('address');
        USession::getInstance()->unsetSessionElement('address');

        /**
         * Create card
         */
        $card = new ECreditCard(UHTTPMethods::post('card-number'), UHTTPMethods::post('expiration-date'), UHTTPMethods::post('cvv'), USession::getInstance()->getSessionElement('customer')->getId(), $address->getId());
        FPersistentManager::getInstance()->createObj($card);

        /**
         * Create order
         */
        $order = new EOrder(USession::getInstance()->getSessionElement('customer')->getId(), $address->getId(), UHTTPMethods::post('card-number'), $cart->getTotalPrice());

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
        USession::getInstance()->setSessionElement('cart', $cart);

        /**
         * Show order confirmation page
         */
        echo "Order confirmed";
        //CALL VIEW, PASS ORDER
    }
}
