<?php

Class CCustomer{

    public static function dashboard(){
        if(CUser::isLogged() && CUser::userType(USession::getSessionElement('customer')) == 'customer'){
            $view = new VUser();
            $view->showUserDashboard();
        }
        else {
            header('Location: MusicCorner/User/Login');
        }
    }
    public static function orders(){
        if(CUser::isLogged() && CUser::userType(USession::getSessionElement('customer')) == 'customer'){
            $v = new VUser();
            $v->showOrderList();
        }
        else {
            header('Location: MusicCorner/User/Login');
        }
    }
    public static function order($orderId){
        if(CUser::isLogged() && CUser::userType(USession::getSessionElement('customer')) == 'customer'){
            $order = FPersistentManager::getInstance()->retrieveObj(EOrder::class, $orderId);
            $v = new VUser();
            if($order->getCustomer() == USession::getInstance()::getSessionElement('customer')->getId()){
                $v->showOrder($order);                
            }
            else {
                $v->showOrderNotAllowed($order);                
            }
        }
        else {
            header('Location: MusicCorner/User/Login');
        }
    }
    public static function reviewArticle(){
        if(CUser::isLogged() && CUser::userType(USession::getSessionElement('customer')) == 'customer'){
            $orderItemId = UHTTPMethods::post('orderItemID');
            $orderItem = FPersistentManager::getInstance()->retrieveObj(EOrderItem::class, $orderItemId);
            if(UHTTPMethods::isPostSet('reviewText')) {
                $reviewText = UHTTPMethods::post('reviewText');
                if(UHTTPMethods::isPostSet('ratinga') && UHTTPMethods::isPostSet('ratings')){
                    $ratinga = UHTTPMethods::post('ratinga');
                    $ratings = UHTTPMethods::post('ratings');
                }
                else {
                    $v = new VUser();
                    $v->showReviewArticleError($orderItem);
                    return;
                }
                $review = new EReview(USession::getInstance()->getSessionElement('customer')->getId(), $reviewText, $ratinga, $ratings, $orderItem->getArticle(), $orderItem->getSeller(), $orderItem->getId());
                FPersistentManager::getInstance()->createObj($review);
                $v = new VUser();
                $v->showReviewSuccess();
                return;
            }
            $v = new VUser();
            $v->showReviewArticle($orderItem);
        }
        else {
            header('Location: MusicCorner/User/Login');
        }
    }

    public static function CustomerReviews(){
        if(CUser::isLogged() && CUser::userType(USession::getSessionElement('customer')) == 'customer'){
            $view = new VUser();
            $view->showCustomerReviews();
        }
        else {
            header('Location: MusicCorner/User/Login');
        }
    }

}