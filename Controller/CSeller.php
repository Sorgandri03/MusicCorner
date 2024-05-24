<?php

Class CSeller{

    public static function dashboard(){
        
        if(USession::isSetSessionElement('seller')){
            echo USession::getSessionElement('seller');
            return;
            //modifica l'header per andare nella dashboard del seller;
        }
        //mostra la view del login
        echo "no";
    }
    public static function addArticle($debug){
        echo $debug;
    }
    public static function removeArticle(){

    }
    public static function modifyArticle(){

    }
    public static function soldProducts(){

    }
    public static function selectProduct(){

    }
    public static function review(){

    }
    public static function sendReview(){

    }
    public static function contact(){

    }
}