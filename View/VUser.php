<?php
require_once 'StartSmarty.php';
class VUser{

    private $smarty;

    public function __construct(){

        $this->smarty = StartSmarty::configuration();

    }

    /**
     * Funzione che indirizza alla pagina con il form di login.
     * @throws SmartyException
     */
    public function showLoginForm(){
        $this->smarty->assign('error', false);
        $this->smarty->assign('ban',false);
        $this->smarty->display('login.tpl');
    }

    /**
     * Funzione che si occupa di gestire la visualizzazione degli errori in fase login
     * @throws SmartyException
     */
    public function loginError() {
        $this->smarty->assign('error',true);
        $this->smarty->assign('ban',false);
        $this->smarty->display('login.tpl');
    }
    
    /**
     * @throws SmartyException
     */
    public function loginBan() {
        $this->smarty->assign('error',false);
        $this->smarty->assign('ban',true);
        $this->smarty->display('login.tpl');
    }

    /**
     * @throws SmartyException
     */
    public function showUserDashboard(){
        if(USession::getInstance()->isSetSessionElement('customer')){
            $this->smarty->display('customer.tpl');
        }
        elseif(USession::getInstance()->isSetSessionElement('seller')){
            $this->smarty->assign('username',USession::getInstance()->getSessionElement('seller'));
            $this->smarty->display('seller.tpl');
        }
        elseif(USession::getInstance()->isSetSessionElement('admin')){
            $this->smarty->assign('username',USession::getInstance()->getSessionElement('admin'));
            $this->smarty->display('admin.tpl');
        } 
    }



}