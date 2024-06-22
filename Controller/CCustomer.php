<?php

Class CCustomer{

    public static function dashboard(){
        if(CUser::isLogged()){
            $view = new VUser();
            $view->showUserDashboard();
        }
        else {
            header('Location: MusicCorner/User/Login');
        }
    }
    public static function orders(){
        if(CUser::isLogged()){
            $v = new VUser();
            $v->showOrderList();
        }
        else {
            header('Location: MusicCorner/User/Login');
        }
    }
    public static function order($orderId){
        if(CUser::isLogged()){
            $order = FPersistentManager::getInstance()->retrieveObj(EOrder::class, $orderId);
            $v = new VUser();
            if($order->getCustomer() != USession::getInstance()::getSessionElement('customer')->getId()){
                $v->showOrderNotAllowed($order);
            }
            else {
                $v->showOrder($order);
            }
        }
        else {
            header('Location: MusicCorner/User/Login');
        }
    }
    public static function reviewArticle($orderItem){
        if(USession::isSetSessionElement('customer')){
            if(CUser::isBanned()){
                echo "You are banned";
                return;
            }
            $article = FPersistentManager::getInstance()->retrieveObj(EOrderItem::class, $orderItem);
            
            //CALL VIEW, PASS STOCK
        }
        //CALL VIEW LOGIN
    }
    public static function sendReview($text, $orderItem, $articleRating, $sellerRating){
        if(USession::isSetSessionElement('customer')){
            if(CUser::isBanned()){
                echo "You are banned";
                return;
            }
            $product = FPersistentManager::getInstance()->retrieveObj(EOrderItem::class, $orderItem);
            $article = $product->getArticle();
            $seller = $article->getSeller();
            $review = new EReview(USession::getInstance()::getSessionElement('customer'), $text, $articleRating, $sellerRating, $article, $seller);
            FPersistentManager::getInstance()->createObj($review);
            //CALL VIEW, PASS ORDER
        }
        //CALL VIEW LOGIN
    }


}