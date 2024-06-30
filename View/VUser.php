<?php
require_once 'StartSmarty.php';
/**
 * This view is responsible for rendering the login page of the MusicCorner website.
 */
class VUser{
    private $smarty;
    public function __construct(){
        $this->smarty = StartSmarty::configuration();
    }

    /**
     * Show the login form
     * @throws SmartyException
     */
    public function showLoginForm() {
        $this->smarty->assign('error', false);
        $this->smarty->assign('ban',false);
        $this->smarty->display('login.tpl');
    }

    /**
     * Show the login form with the error message
     * @throws SmartyException
     */
    public function loginError() {
        $this->smarty->assign('error',true);
        $this->smarty->assign('ban',false);
        $this->smarty->display('login.tpl');
    }
    
    /**
     * Show the ban message to the customer
     * @throws SmartyException
     */
    public function loginBan() {
        $this->smarty->assign('error',false);
        $this->smarty->assign('ban',true);
        $this->smarty->display('login.tpl');
    }   
}