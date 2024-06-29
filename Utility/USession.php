<?php

/**
 * Class to access to the $_SESSION superglobal array, you Must use this class instead of using directly the array
 */
class USession{

    /**
     * Singleton class
     * Class for the session, if you want to manipulate the _SESSION superglobal you need to use this class
     */

    private static $instance;

    private function __construct() {
    $ses_exp = 2592000; // 30 days in seconds
    session_set_cookie_params($ses_exp); //set the duration of the session cookie
    session_start(); //start the session
    }

    public static function getInstance() {
    if (self::$instance == null) {
        self::$instance = new USession();
    }

    return self::$instance;
    }

    //END SINGLETON

    /**
     * Returns session status. If you want to check if the session is staretd you can use this
     * @return int
     */
    public static function getSessionStatus(){
        return session_status();
    }

    /**
     * Unset all the elements in the _SESSION superglobal
     */
    public static function unsetSession(){
        session_unset();
    }

    /**
     * Unset of an element of _SESSION superglobal
     */
    public static function unsetSessionElement($id){
        unset($_SESSION[$id]);
    }

    /**
     * Destroy the session
     */
    public static function destroySession(){
        session_destroy();
    }

    /**
     * Get element in the _SESSION superglobal
     */
    public static function getSessionElement($id){
        return $_SESSION[$id];
    }

    /**
     * Set an element in _SESSION superglobal
     */
    public static function setSessionElement($id, $value){
        $_SESSION[$id] = $value;
    }

    /**
     * Check if an element is set or not
     * @return boolean
     */
    public static function isSetSessionElement($id){
        if(isset($_SESSION[$id])){
            return true;
        }else{
            return false;
        }
    }
}