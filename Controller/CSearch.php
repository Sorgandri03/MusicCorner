<?php
/**
 * Class to manage the search and display of articles and the homepage of a seller
 */
class CSearch{
    /**
     * The page with the search results
     */
    public static function search(){
        $query = UHTTPMethods::post('query');
        /**
         * Retrieve articles from query
         */
        $articles = FPersistentManager::getInstance()->searchArticles(urldecode($query));
        if (count($articles) == 0){
            $view = new VSearch();
            $view->showSearchError();
            return;
        }else{
            /**
             * Show search page
             */
            $view = new VSearch();
            $view->showSearch($articles);
        }
        

    }

    /**
     * The page with the details of an article
     * @param string $articleId The EAN of the article
     */
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

    /**
     * The page with every article of a specific format
     * @param string $format The format of the articles
     */
    public static function format(string $format){
        /**
        * Convert format to integer
        */
        switch($format){
            case 'CD':
                $format = 0;
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

    /**
     * The homepage of a seller
     */
    public static function store(){
        $stockId = UHTTPMethods::post('stockId');
        $stock = FPersistentManager::getInstance()->retrieveObj(EStock::class, $stockId);
        $seller = FPersistentManager::getInstance()->retrieveObj(ESeller::class, $stock->getSeller());
        
        $v = new VSearch();
        $v->showSellerHomepageFromCustomer($seller);
    }
}
