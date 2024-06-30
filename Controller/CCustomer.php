<?php
/**
 * Class that contains all the customer methods
 
 */
Class CCustomer{
    /**
     * Show the customer dashboard
     */
    public static function dashboard(){
        /**
         * Check if the user is logged and if it is a customer
         */
        if(CUser::isLogged() && CUser::userType(USession::getSessionElement('customer')) == 'customer'){
            $view = new VCustomer();
            $view->showDashboard();
        }
        /**
         * Redirect to login if the user is not logged or is not a customer
         */
        else {
            header('Location: /MusicCorner/User/Login');
        }
    }

    /**
     * Show the customer's orders
     */
    public static function orders(){
        /**
         * Check if the user is logged and if it is a customer
         */
        if(CUser::isLogged() && CUser::userType(USession::getSessionElement('customer')) == 'customer'){
            $v = new VCustomer();
            $v->showOrderList();
        }
        /**
         * Redirect to login if the user is not logged or is not a customer
         */
        else {
            header('Location: /MusicCorner/User/Login');
        }
    }

    /**
     * Show the order details
     */
    public static function order(){
        /**
         * Check if the user is logged and if it is a customer
         */
        if(CUser::isLogged() && CUser::userType(USession::getSessionElement('customer')) == 'customer'){
            /**
             * Get the order id and the order
             */
            $orderId = UHTTPMethods::post('orderID');
            $order = FPersistentManager::getInstance()->retrieveObj(EOrder::class, $orderId);
            $v = new VCustomer();
            /**
             * Check if the order belongs to the customer
             */
            if($order->getCustomer() == USession::getInstance()::getSessionElement('customer')->getId()){
                $v->showOrder($order);                
            }
            /**
             * Show an error message if the order does not belong to the customer
             */
            else {
                $v->showOrderNotAllowed();                
            }
        }
        /**
         * Redirect to login if the user is not logged or is not a customer
         */
        else {
            header('Location: /MusicCorner/User/Login');
        }
    }

    /**
     * Show the customer the form to review an article
     */
    public static function reviewArticle(){
        /**
         * Check if the user is logged and if it is a customer
         */
        if(CUser::isLogged() && CUser::userType(USession::getSessionElement('customer')) == 'customer'){
            /**
             * Get the order item id and the order item
             */
            $orderItemId = UHTTPMethods::post('orderItemID');
            $orderItem = FPersistentManager::getInstance()->retrieveObj(EOrderItem::class, $orderItemId);
            /**
             * Check if the customer sent the review
             */
            if(UHTTPMethods::isPostSet('reviewText')) {
                $reviewText = UHTTPMethods::post('reviewText');
                /**
                 * Check if the the ratings are set
                 */
                if(UHTTPMethods::isPostSet('ratinga') && UHTTPMethods::isPostSet('ratings')){
                    $ratinga = UHTTPMethods::post('ratinga');
                    $ratings = UHTTPMethods::post('ratings');
                }
                /**
                 * Show an error message if the ratings are not set
                 */
                else {
                    $v = new VCustomer();
                    $v->showReviewArticleError($orderItem);
                    return;
                }
                $review = new EReview(USession::getInstance()->getSessionElement('customer')->getId(), $reviewText, $ratinga, $ratings, $orderItem->getArticle(), $orderItem->getSeller(), $orderItem->getId());
                FPersistentManager::getInstance()->createObj($review);
                $v = new VCustomer();
                $v->showReviewSuccess();
                return;
            }
            /**
             * Show the review form
             */
            $v = new VCustomer();
            $v->showReviewArticle($orderItem);
        }
        /**
         * Redirect to login if the user is not logged or is not a customer
         */
        else {
            header('Location: /MusicCorner/User/Login');
        }
    }

    /**
     * Show the customer his reviews
     */
    public static function customerReviews(){
        /**
         * Check if the user is logged and if it is a customer
         */
        if(CUser::isLogged() && CUser::userType(USession::getSessionElement('customer')) == 'customer'){
            $view = new VCustomer();
            $view->showCustomerReviews();
        }
        /**
         * Redirect to login if the user is not logged or is not a customer
         */
        else {
            header('Location: /MusicCorner/User/Login');
        }
    }
}