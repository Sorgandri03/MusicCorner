<?php

Class CCustomer{

    public static function dashboard(){
        if(USession::getInstance()::isSetSessionElement('customer')){
            $view = new VUser();
            $view->showUserDashboard();
            return;
            //modifica l'header per andare nella dashboard del customer;
        }
        else{
            $view = new VUser();
            $view->showLoginForm();
            return;
            //mostra la view del login
        }
        
    }
    public static function orders(){
        if(USession::isSetSessionElement('customer')){
            if(CUser::isBanned()){
                echo "You are banned";
                return;
            }
            
            $customer = USession::getSessionElement('customer');

            //CHIAMA VIEW ORDINI E PASSA CUSTOMER
        }
        //CHIAMA VIEW LOGIN
    }
    public static function order($orderId){
        if(USession::isSetSessionElement('customer')){
            if(CUser::isBanned()){
                echo "You are banned";
                return;
            }
            $order = FPersistentManager::getInstance()->retrieveObj(EOrder::class, $orderId);
            
            //CALL VIEW, PASS CUSTOMER
        }
        //CALL VIEW LOGIN
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