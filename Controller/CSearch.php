<?php

class CSearch{
    public static function search(){
        $query = UHTTPMethods::post('query');
        /**
         * Retrieve article from idArticle
         */
        $articles = FPersistentManager::getInstance()->searchArticles(urldecode($query));
        
        /**
         * Show article page
         */
        $view = new VSearch();
        $view->showSearch($articles);
    }
    public static function article(string $articleId){
        /**
        * Retrieve article from idArticle
        */
        $article = FPersistentManager::getInstance()->retrieveObj(EArticleDescription::class, $articleId);
        
        /**
        * Show article page
        */
        $view = new VArticle();
        $view->showArticle($article);
    }
}
