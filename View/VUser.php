<?php

class VUser{

    private $smarty;

    public function __construct(){

        $this->smarty = StartSmarty::configuration();

    }

    /**
     * @throws SmartyException
     */
    public function home(){
        
        if(USession::getInstance()->isSetSessionElement('username'))
            $this->smarty->assign('username',USession::getInstance()->getSessionElement('username'));
        else
            $this->smarty->assign('username','Accedi/Registrati');
     
        $this->smarty->display('home.tpl');
    }

    /**
     * Funzione che indirizza alla pagina con il form di login.
     * @throws SmartyException
     */
    public function showLoginForm(){
        $this->smarty->assign('error', false);
        $this->smarty->assign('ban',false);
        $this->smarty->assign('regErr',true);
        $this->smarty->display('login.tpl');
    }

    /**
     * Funzione che si occupa di gestire la visualizzazione degli errori in fase login
     * @throws SmartyException
     */
    public function loginError() {
        $this->smarty->assign('error',true);
        $this->smarty->assign('ban',false);
        $this->smarty->assign('regErr',false);
        $this->smarty->display('login.tpl');
    }
    
    public function registrationError() {
        $this->smarty->assign('error',false);
        $this->smarty->assign('ban',false);
        $this->smarty->assign('regErr',true);
        $this->smarty->display('login.tpl');
    }

    /**
     * @throws SmartyException
     */
    public function loginBan() {
        $this->smarty->assign('error',false);
        $this->smarty->assign('ban',true);
        $this->smarty->assign('regErr',false);
        $this->smarty->display('login.tpl');
    }

}