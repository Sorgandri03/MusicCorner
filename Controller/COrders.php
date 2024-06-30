<?php

class COrders{
    
    /**
     * Add a product to the cart using a post request
     */
    public static function addToCart(){
        $stockId = UHTTPMethods::post('stockId');
        if(UHTTPMethods::isPostSet('quantity')){
            $quantity = UHTTPMethods::post('quantity');
        }
        else{
            $quantity = 1;
        }
        self::cartAdd($stockId, $quantity);
        
        /**
         * Go to cart page
         */
        header('Location: /MusicCorner/Orders/cart');
    }

    /**
     * Add a product to the cart not using a post request, does not redirect to the cart page
     * @param int $stockId The id of the stock
     * @param int $quantity The quantity of the product
     */
    public static function cartAdd($stockId, $quantity){
        /**
         * Retrieve user cart from the session
         */
        if(CUser::islogged()){
            $customer = USession::getInstance()->getSessionElement('customer');
            if(USession::getInstance()->isSetSessionElement($customer->getUsername())){
                $cart = USession::getInstance()->getSessionElement($customer->getUsername());
            }
            else{
                $cart = new ECart($customer->getId());
                USession::getInstance()->setSessionElement($customer->getUsername(),$cart);
            }
        }
        else {
            if(USession::getInstance()->isSetSessionElement('cartguest')){
                $cart = USession::getInstance()->getSessionElement('cartguest');
            }
            else{
                $cart = new ECart('guest');
                USession::getInstance()->setSessionElement('cartguest',$cart);
            }
        }

        /**
         * Check if the quantity is greater than available
         */
        $stock = FPersistentManager::getInstance()->retrieveObj(EStock::class, $stockId);
        if($quantity > $stock->getQuantity()){
            $quantity = $stock->getQuantity();
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
    }
    
    /**
     * The cart page
     */
    public static function cart(){
        /**
         * Check if the user is updating a cart item
         */
        if(UHTTPMethods::isPostSet('stockId') && UHTTPMethods::isPostSet('quantity')){
            self::updateCart();
            return;
        }
        else{
            /**
             * Show cart page
             */
            $v = new VOrders();
            $v->showCart();
        }        
    }

    /**
     * Remove a product from the cart
     */
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
            $cart = new ECart(USession::getInstance()->getSessionElement('email'));
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

    /**
     * Update the quantity of a product in the cart
     */
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
            $cart = new ECart(USession::getInstance()->getSessionElement('email'));
        }

        /**
         * Check if the quantity is greater than available
         */
        $stock = FPersistentManager::getInstance()->retrieveObj(EStock::class, $stockId);
        $error = false;
        if($quantity > $stock->getQuantity()){
            $quantity = $stock->getQuantity();
            $error = true;
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
        $v = new VOrders();
        if($error){
            $v->showCartQuantityError();
        }
        else{
            $v->showCart();
        }
    }

    /**
     * Clear the cart
     */
    public static function clearCart(){
        /**
         * Retrieve user cart from the session
         */
        if(USession::getInstance()->isSetSessionElement('cart')){
            $cart = USession::getInstance()->getSessionElement('cart');
        }
        else{
            $cart = new ECart(USession::getInstance()->getSessionElement('email'));
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

    /**
     * The first page of the order, where the user can choose the address
     */
    public static function checkout(){
        if(!CUser::islogged()){
            header('Location: /MusicCorner/User/login');
            return;            
        }
        if(USession::getInstance()->isSetSessionElement('seller') || USession::getInstance()->isSetSessionElement('admin')){
            header('Location: /MusicCorner/404');
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

        if(UHTTPMethods::isPostSet('useSavedAddress') || UHTTPMethods::isPostSet('street') || UHTTPMethods::isPostSet('city') || UHTTPMethods::isPostSet('zip-code') || UHTTPMethods::isPostSet('first-name') || UHTTPMethods::isPostSet('last-name') || UHTTPMethods::isPostSet('saveAddress')){
            if(UHTTPMethods::isPostSet('useSavedAddress')){
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
            header('Location: /MusicCorner/Orders/payment');
        }
        else{
            $v = new VOrders();
            $v->showOrderAddress();
            return;
        }
        
        /**
         * Pass customer to the view
         */
        $v = new VOrders();
        $v->showOrderAddress();
    }

    /**
     * The last page of the order, where the user can choose the payment method
     */
    public static function payment(){
        if(!CUser::islogged() && CUser::userType(USession::getInstance()->getSessionElement('customer')) == 'customer'){
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

        if(UHTTPMethods::isPostSet('otherAddress') || UHTTPMethods::isPostSet('useSavedCard') || UHTTPMethods::isPostSet('card-number') || UHTTPMethods::isPostSet('card-owner') || UHTTPMethods::isPostSet('cvv') || UHTTPMethods::isPostSet('expiration-date')){
            /**
             * Retrieve address
             */
            $address = USession::getInstance()->getSessionElement('address');

            /**
             * Check if the card has a different address
             */
            if(UHTTPMethods::isPostSet('otherAddress')){
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
            if(UHTTPMethods::isPostSet('useSavedCard')){
                $card = FPersistentManager::getInstance()->retrieveObj(ECreditCard::class, UHTTPMethods::post('useSavedCard'));
            }
            else {
                if(UHTTPMethods::post('card-number') && UHTTPMethods::post('card-owner') && UHTTPMethods::post('cvv') && UHTTPMethods::post('expiration-date')){
                    /**
                     * Check wether the user wants to save the card
                     */
                    if(UHTTPMethods::post('saveCard')){
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
            
            USession::getInstance()->setSessionElement('card', $card);
            header('Location: /MusicCorner/Orders/orderConfirm');
        }

        $v = new VOrders();
        $v->showOrderPayment();
    }
    
    /**
     * The order confirmation page
     */
    public static function orderConfirm(){
        /**
         * Check if the user is logged in and is not a seller or admin
         */
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
         * Retrieve card
         */
        $card = USession::getInstance()->getSessionElement('card');

        /**
         * Create order
         */
        $order = new EOrder(USession::getInstance()->getSessionElement('customer')->getId(), $address->getId(), $card->getId(), $cart->getTotalPrice());

        /**
         * Unset address
         */
        USession::getInstance()->unsetSessionElement('address');

        /**
         * Unset card
         */
        USession::getInstance()->unsetSessionElement('card');

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
        $v = new VOrders();
        $v->showOrderConfirm();
    }
}
