<?php

Class CSeller{

    public static function dashboard(){
        if(CUser::isLogged()){
            $view = new VUser();
            $view->showUserDashboard();
            return;
        }
        else{
            $view = new VUser();
            $view->showLoginForm();
            return;
        }
    }

   public static function addArticle(){
        $view = new VUser();
        $view->showAddArticle();
    }

   public static function modifyStock(){
        $view = new VUser();
        $view->showModifyStock();

        $article = new EArticleDescription(UHTTPMethods::post('EAN'), UHTTPMethods::post('article-name'), UHTTPMethods::post('artist-name'), UHTTPMethods::post('first-name')." ".UHTTPMethods::post('last-name'), USession::getInstance()->getSessionElement('customer')->getId());
        FPersistentManager::getInstance()->createObj($article);
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

    }

    public static function review(){

    }
    public static function sendReview(){

    }
    public static function contact(){

    }

}