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
            $this->smarty->assign('username',USession::getInstance()->getSessionElement('customer')->getUsername());
            $this->smarty->display('customer.tpl');
            exit;
        }
        elseif(USession::getInstance()->isSetSessionElement('seller')){
            $this->smarty->assign('username',USession::getInstance()->getSessionElement('seller')->getShopName());
            $this->smarty->display('seller.tpl');
            exit;
        }
        elseif(USession::getInstance()->isSetSessionElement('admin')){
            $this->smarty->assign('username',USession::getInstance()->getSessionElement('admin'));
            $this->smarty->display('admin.tpl');
        } 
    }

    public function showAddArticle(){
        $this->smarty->assign('found',"");
        $this->smarty->display('addArticle.tpl');
    }
    public function showModifyStock(){
        $this->smarty->display('modifystock.tpl');
    }

    public function addArticleSuccess() {
        $this->smarty->assign('found',"true");
        $this->smarty->display('addarticle.tpl');
    }

    public function addArticleFail() {
        $this->smarty->assign('found',"false");
        $this->smarty->display('addarticle.tpl');
    }






}