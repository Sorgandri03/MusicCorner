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
            $article = FPersistentManager::getInstance()->getArticleDetailsByEAN($ean);
            if ($article) {
                $view->addArticleSuccess($article['EAN'], $article['name'], $article['artist']); //dovro metterci il formato
            } else {
                $view->addArticleFail();
            }
        } else {
            $view->addArticleFail();
        }
    }
    
    public static function soldProducts(){

    }

    public static function review(){

    }
    public static function sendReview(){

    }
    public static function contact(){

    }

}