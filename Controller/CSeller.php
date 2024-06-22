<?php

Class CSeller{

    public static function dashboard(){
        if(CUser::isLogged() && CUser::userType(USession::getSessionElement('seller')) == 'seller'){
            $view = new VUser();
            $view->showUserDashboard();
            return;
        }
        else{
            header('Location: MusicCorner/User/Login');
        }
    }

    public static function addArticle(){
        if(CUser::isLogged() && CUser::userType(USession::getSessionElement('seller')) == 'seller'){
            $view = new VUser();
            $view->showAddArticle();
        }
        else {
            header('Location: MusicCorner/User/Login');
        }
    }
   
    public static function pullArticle(){
        $view = new VUser();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['EAN']) && isset($_POST['product-name']) && isset($_POST['artist-name']) && isset($_POST['format'])  && isset($_POST['price']) && isset($_POST['quantity'])) {
                $EAN = UHTTPMethods::post('EAN');
                $name = UHTTPMethods::post('product-name');
                $artist = UHTTPMethods::post('artist-name');
                $format = 0 /*UHTTPMethods::post('format') DA FIXARE*/;
                $price = UHTTPMethods::post('price');
                $quantity = UHTTPMethods::post('quantity');
            if(CUser::isLogged() && CUser::userType(USession::getSessionElement('seller')) == 'seller'){  
                $article = new EArticleDescription($EAN, $name, $artist, $format);
                $stock = new EStock($article->getId(), $quantity, $price, USession::getSessionElement('seller')->getId());
                $exists = FArticleDescription::getInstance()->existEAN($EAN);
                FPersistentManager::getInstance()->createObj($stock);
                if (!$exists) {
                    FPersistentManager::getInstance()->createObj($article);
                }
            }else{
                header('Location: /MusicCorner/User/login');
                return;
            }   
            
            } else {
                
                return;
            }
        } else {
            
        }
    }

   public static function modifyStock(){
        if(CUser::isLogged() && CUser::userType(USession::getSessionElement('seller')) == 'seller'){
            $view = new VUser();
            $view->showModifyStock();
        }
        else {
            header('Location: MusicCorner/User/Login');
        }
   }


    public static function searchEAN() {
        $view = new VUser();
        $ean = UHTTPMethods::post('EAN');
        $exists = FPersistentManager::getInstance()->verifyEAN($ean);
        
        if ($exists) {
            $article = FPersistentManager::getInstance()->getArticleByEAN($ean);
            if ($article) {
                $view->addArticleSuccess($article);
            } else {
                $view->addArticleFail();
            }
        } else {
            $view->addArticleFail();
        }
    }
    
    public static function soldProducts(){
        if(CUser::isLogged() && CUser::userType(USession::getSessionElement('seller')) == 'seller'){
            $view = new VUser();
            $view->showSoldProducts();
        }
        else {
            header('Location: MusicCorner/User/Login');
        }
    }

    public static function review(){

    }
    public static function sendReview(){

    }
    public static function contact(){

    }

}