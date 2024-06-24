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

    /**
     * Funzione che si occupa di visualizzare la lista degli ordini dell'utente
     * @throws SmartyException
     */
    public function showOrderList(){
        $customer = FPersistentManager::getInstance()->retrieveObj(ECustomer::class,USession::getInstance()->getSessionElement('customer')->getId());
        $this->smarty->assign('customer',$customer);
        $this->smarty->display('orderlist.tpl');
    }

    /**
     * Funzione che si occupa di visualizzare l'ordine dell'utente
     * @throws SmartyException
     */
    public function showOrder($order){
        $this->smarty->assign('allowed',true);
        $this->smarty->assign('order',$order);
        $this->smarty->display('order.tpl');
    }

    /**
     * Funzione che avvisa l'utente che non può visualizzare l'ordine
     * @throws SmartyException
     */
    public function showOrderNotAllowed($order){
        $this->smarty->assign('order',$order);
        $this->smarty->display('order.tpl');
    }

    /**
     * Funzione che si occupa di visualizzare la pagina per la recensione di un articolo
     * @throws SmartyException
     */
    public function showReviewArticle($orderItem){
        $this->smarty->assign('success', false);
        $this->smarty->assign('customer', USession::getInstance()->getSessionElement('customer'));
        $this->smarty->assign('orderItem', $orderItem);
        $this->smarty->display('reviewarticle.tpl');
    }

    /**
     * Funzione che si occupa di visualizzare la pagina per la recensione di un articolo
     * @throws SmartyException
     */
    public function showReviewArticleError($orderItem){
        $this->smarty->assign('success', false);
        $this->smarty->assign('error', true);
        $this->smarty->assign('customer', USession::getInstance()->getSessionElement('customer'));
        $this->smarty->assign('orderItem', $orderItem);
        $this->smarty->display('reviewarticle.tpl');
    }

    /**
     * Funzione che si occupa di indicare all'utente che la recensione è stata inviata con successo
     * @throws SmartyException
     */
    public function showReviewSuccess(){
        $this->smarty->assign('success', true);
        $this->smarty->display('reviewarticle.tpl');
    }

    /**
     * Funzione che si occupa di visualizzare le recensioni dell'utente
     * @throws SmartyException
     */
    public function showCustomerReviews(){
        $customer = FPersistentManager::getInstance()->retrieveObj(ECustomer::class,USession::getInstance()->getSessionElement('customer')->getId());
        $this->smarty->assign('customer',$customer);
        $this->smarty->display('customerreviews.tpl');
    }
   
}