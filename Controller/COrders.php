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
         * Check if the cart is empty
         */
        if(count($cart->getCartItems()) == 0){
            header('Location: /MusicCorner/Orders/cart');
            return;
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

        /**
         * Check if the user used a saved address
         */
        if(UHTTPMethods::post('useSavedAddress') != 0){
            $address = FPersistentManager::getInstance()->retrieveObj(EAddress::class, UHTTPMethods::post('useSavedAddress'));
        }
        else {
            if(UHTTPMethods::post('street') && UHTTPMethods::post('city') && UHTTPMethods::post('zip-code') && UHTTPMethods::post('first-name') && UHTTPMethods::post('last-name')){
                /**
                 * Check wether the user wants to save the address
                 */
                if(UHTTPMethods::post('saveAddress') == 'true'){
                    $address = new EAddress(UHTTPMethods::post('street'), UHTTPMethods::post('city'), UHTTPMethods::post('zip-code'), UHTTPMethods::post('first-name')." ".UHTTPMethods::post('last-name'), USession::getInstance()->getSessionElement('customer')->getId());
                }
                else{
                    $address = new EAddress(UHTTPMethods::post('street'), UHTTPMethods::post('city'), UHTTPMethods::post('zip-code'), UHTTPMethods::post('first-name')." ".UHTTPMethods::post('last-name'), '');
                }
                FPersistentManager::getInstance()->createObj($address);
            }
            else{
                $v = new VOrders();
                $v->showOrderAddressError();
                return;
            }
        }

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

        /**
         * Check if the card has a different address
         */
        if(UHTTPMethods::post('otherAddress') == 'true'){
            if(UHTTPMethods::post('street') && UHTTPMethods::post('city') && UHTTPMethods::post('zip-code') && UHTTPMethods::post('first-name') && UHTTPMethods::post('last-name')){
                $billingAddress = new EAddress(UHTTPMethods::post('street'), UHTTPMethods::post('city'), UHTTPMethods::post('zip-code'), UHTTPMethods::post('first-name')." ".UHTTPMethods::post('last-name'), '');
                FPersistentManager::getInstance()->createObj($billingAddress);
            }
            else{
                $v = new VOrders();
                $v->showOrderPaymentError();
                return;
            }
        }
        else{
            $billingAddress = $address;
        }

        /**
         * Check if the user used a saved card
         */
        if(UHTTPMethods::post('useSavedCard') != 0){
            $card = FPersistentManager::getInstance()->retrieveObj(ECreditCard::class, UHTTPMethods::post('useSavedCard'));
        }
        else {
            if(UHTTPMethods::post('card-number') && UHTTPMethods::post('card-owner') && UHTTPMethods::post('cvv') && UHTTPMethods::post('expiration-date')){
                /**
                 * Check wether the user wants to save the card
                 */
                if(UHTTPMethods::post('saveCard') == 'true'){
                    $card = new ECreditCard(UHTTPMethods::post('card-number'), UHTTPMethods::post('expiration-date'), UHTTPMethods::post('cvv'), UHTTPMethods::post('card-owner'), USession::getInstance()->getSessionElement('customer')->getId(), $billingAddress->getId());
                }
                else{
                    $card = new ECreditCard(UHTTPMethods::post('card-number'), UHTTPMethods::post('expiration-date'), UHTTPMethods::post('cvv'), UHTTPMethods::post('card-owner'), '', $billingAddress->getId());
                }
                FPersistentManager::getInstance()->createObj($card);
            }
            else{
                $v = new VOrders();
                $v->showOrderPaymentError();
                return;
            }
        }

        /**
         * Check wether the user checked the terms and conditions
         */
        if(UHTTPMethods::post('terms') == 'false'){
            $v = new VOrders();
            $v->showOrderPaymentErrorTerms();
            return;
        }

        /**
         * Create order
         */
        $order = new EOrder(USession::getInstance()->getSessionElement('customer')->getId(), $address->getId(), $card->getId(), $cart->getTotalPrice());

        /**
         * Unset address
         */
        USession::getInstance()->unsetSessionElement('address');

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
            FPersistentManager::getInstance()->updateObj($stock);
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
