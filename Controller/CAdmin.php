<?php

class CAdmin{

/**
 * check if the Admin is logged (using session)
 * @return boolean
 */
public static function isLogged()
{
    $logged = false;

    if(UCookie::isSet('PHPSESSID')){
        if(session_status() == PHP_SESSION_NONE){
            USession::getInstance();
        }
    }
    if(USession::isSetSessionElement('admin')){
        $logged = true;
    }
    if(!$logged){
        //mostra la pagina di login
        exit;
    }
    return true;
}

public static function login(){
    if(UCookie::isSet('PHPSESSID')){
        if(session_status() == PHP_SESSION_NONE){
            USession::getInstance();
        }
    }
    if(USession::isSetSessionElement('admin')){
        //modifica l'header per andare nella dashboard dell'admin;
    }
    //mostra la view specifica dell'admin
}

/**
 * check if exist the Username inserted, and for this username check the password. If is everything correct the session is created and
 * the Mod is redirected in the homepage
 */
public static function checkLogin()
{
    // TO DO
}



/**
 * this method can logout the User, unsetting all the session element and destroing the session. Return the user to the Login Page
 * @return void
 */
public static function logout(){
    USession::getInstance();
    USession::unsetSession();
    USession::destroySession();
    //ritorna alla pagina di login;
}
}