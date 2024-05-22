<?php

class CSearch{
    public static function searchArticle(string $query){
        /**
         * Retrieve article from idArticle
         */
        $article = FPersistentManager::getInstance()->retrieveObj(EArticleDescription::class, $query);
        
        /**
         * Show article page
         */
        //CALL VIEW, PASS PRODUCT
    }
}
