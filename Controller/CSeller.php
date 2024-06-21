<?php

Class CSeller{


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

    public static function searchEAN(){
        $view = new VUser();
        $ean = UHTTPMethods::post('EAN');
        $article = FPersistentManager::getInstance()->verifyEAN($ean);
        if ($article) {
            $view->addArticleSuccess();
        } else {
            $view->addArticleFail();
    }}

    
    public static function soldProducts(){

    }

    public static function review(){

    }
    public static function sendReview(){

    }
    public static function contact(){

    }

}