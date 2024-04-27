<?php

class FArticleDescription extends FEntityManager{
    public function create(EArticleDescription $Article){
        $query = "INSERT INTO article_description VALUES (:ean, :name, :artist, :genre, :format)";
    }
    
    
}