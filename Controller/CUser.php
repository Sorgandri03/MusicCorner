<?php

class CUser{
    public static function isLogged(){
        $logged = false;
        if(UCookie::isSet('PHPSESSID')){
            if(session_status() == PHP_SESSION_NONE){
                USession::getInstance();
            }
        }
        if(USession::isSetSessionElement('user')){
            $logged = true;
            //self::isBanned();
        }
        if(!$logged){
            //$view = new VUser();
            //$view->showLoginForm();
            exit;
        }
        return true;
    }

}