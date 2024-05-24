<?php

class CSearch{
    public static function search(string $query){
        /**
         * Retrieve article from idArticle
         */
        $articles = FPersistentManager::getInstance()->searchArticles(urldecode($query));
        foreach($articles as $article){
            echo $article->getName() . "<br>";
        }
        
        /**
         * Show article page
         */
        //CALL VIEW, PASS PRODUCTS
    }
    public static function article(int $articleId){
        /**
        * Retrieve article from idArticle
        */
        $article = FPersistentManager::getInstance()->retrieveObj(EArticleDescription::class, $articleId);
        
        /**
        * Show article page
        */
        //CALL VIEW, PASS PRODUCT
    }
}
