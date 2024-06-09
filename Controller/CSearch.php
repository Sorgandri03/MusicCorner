<?php

class CSearch{
    public static function search(){
        $query = UHTTPMethods::post('query');
        /**
         * Retrieve articles from query
         */
        $articles = FPersistentManager::getInstance()->searchArticles(urldecode($query));
        
        /**
         * Show search page
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
        $view = new VSearch();
        $view->showArticle($article);
    }

    public static function format(string $format){
        /**
        * Convert format to integer
        */
        switch($format){
            case 'CD':
                $format = 0;
                break;
            case 'Cassette':
                $format = 2;
                break;
            case 'Vinyl':
                $format = 1;
                break;
            default:
                $view = new V404();
                $view->show404();
                return;
        }
        $articles = FPersistentManager::getInstance()->getArticlesByFormat($format);
        
        /**
         * Show search page
         */
        $view = new VSearch();
        $view->showSearch($articles);
    }
}
