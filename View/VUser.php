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
     * Funzione che si occupa di visualizzare la pagina per l'aggiunta di un articolo
     * @throws SmartyException
     */
    public function showAddArticle(){
        $seller = FPersistentManager::getInstance()->retrieveObj(ESeller::class,USession::getInstance()->getSessionElement('seller')->getId());
        $this->smarty->assign('seller',$seller);
        $this->smarty->assign('success', "false");
        $this->smarty->assign('found',"");
        $this->smarty->display('addArticle.tpl');
    }
    
    /**
     * Funzione che si occupa di visualizzare la pagina per l'aggiunta di un articolo nel caso in cui l'EAN sia esistente nel DB
     * @throws SmartyException
     */
    public function addArticleSuccess($article) {
        $seller = FPersistentManager::getInstance()->retrieveObj(ESeller::class,USession::getInstance()->getSessionElement('seller')->getId());
        $this->smarty->assign('seller',$seller);
        $this->smarty->assign('success', "false");
        $this->smarty->assign('found',"true");
        $this->smarty->assign('EAN', $article->getId());
        $this->smarty->assign('productName', $article->getName());
        $this->smarty->assign('artistName', $article->getArtist());
        $this->smarty->assign('format', Format[$article->getFormat()]);
        $this->smarty->display('addarticle.tpl');
    }
    /**
     * Funzione che si occupa di visualizzare la pagina per l'aggiunta di un articolo nel caso in cui l'EAN non sia esistente nel DB
     */

    public function addArticleFail() {
        $seller = FPersistentManager::getInstance()->retrieveObj(ESeller::class,USession::getInstance()->getSessionElement('seller')->getId());
        $this->smarty->assign('formats', Format);
        $this->smarty->assign('success', "false");
        $this->smarty->assign('seller',$seller);
        $this->smarty->assign('found',"false");
        $this->smarty->display('addarticle.tpl');
    }

    public function showSuccessMessage() {
        $this->smarty->assign('success', "true");
        $this->smarty->assign('found',"finish");
        $this->smarty->display('addarticle.tpl');
    }   


    public function showModifyStock(){
        USession::getInstance()->setSessionElement('seller',FPersistentManager::getInstance()->retrieveObj(ESeller::class,'petricola@petricolastore.it'));
        $seller = FPersistentManager::getInstance()->retrieveObj(ESeller::class,USession::getInstance()->getSessionElement('seller')->getId());
        $this->smarty->assign('seller',$seller);
        $this->smarty->display('modifystock.tpl');
    }
    public function showModifyStockError(){
        $seller = FPersistentManager::getInstance()->retrieveObj(ESeller::class,USession::getInstance()->getSessionElement('seller')->getId());
        $this->smarty->assign('seller',$seller);
        $this->smarty->assign('error',true);
        $this->smarty->display('modifystock.tpl');
    }
    public function showModifyStockSuccess(){
        $seller = FPersistentManager::getInstance()->retrieveObj(ESeller::class,USession::getInstance()->getSessionElement('seller')->getId());
        $this->smarty->assign('seller',$seller);
        $this->smarty->assign('success',true);
        $this->smarty->display('modifystock.tpl');
    }

    public function showSellerRecensions(){
        $seller = FPersistentManager::getInstance()->retrieveObj(ESeller::class,USession::getInstance()->getSessionElement('seller')->getId());
        $this->smarty->assign('seller',$seller);
        $this->smarty->display('sellerrecension.tpl');
    }
    

    public function showSoldProducts(){
        $seller = FPersistentManager::getInstance()->retrieveObj(ESeller::class,USession::getInstance()->getSessionElement('seller')->getId());
        $this->smarty->assign('seller',$seller);
        $this->smarty->display('soldproducts.tpl');
    }
}