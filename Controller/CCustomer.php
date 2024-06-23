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
            $orderItemId = UHTTPMethods::post('orderItemId');
            $orderItem = FPersistentManager::getInstance()->retrieveObj(EOrderItem::class, $orderItemId);
            $v = new VUser();
            $v->showReviewArticle($orderItem);
        }
        else {
            header('Location: MusicCorner/User/Login');
        }
    }
    public static function sendReview(){
        if(CUser::isLogged() && CUser::userType(USession::getSessionElement('customer')) == 'customer'){
            $reviewText = UHTTPMethods::post('reviewText');
            $orderItemId = UHTTPMethods::post('orderItemId');
            $orderItem = FPersistentManager::getInstance()->retrieveObj(EOrderItem::class, $orderItemId);
            if(UHTTPMethods::post('ratinga')!=null && UHTTPMethods::post('ratings')!=null){
                $ratinga = UHTTPMethods::post('ratinga');
                $ratings = UHTTPMethods::post('ratings');
            }
            else {
                $v = new VUser();
                $v->showReviewArticleError($orderItem);
            }
            $review = new EReview(USession::getInstance()->getSessionElement('customer')->getId(), $reviewText, $ratinga, $ratings, $orderItem->getArticle(), $orderItem->getSeller());
            FPersistentManager::getInstance()->createObj($review);
            $v = new VUser();
            $v->showReviewSuccess();
        }
        else {
            header('Location: MusicCorner/User/Login');
        }
    }


}