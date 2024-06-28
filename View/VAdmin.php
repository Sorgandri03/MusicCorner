<?php
require_once 'StartSmarty.php';
class VAdmin{
       
private $smarty;

public function __construct(){

    $this->smarty = StartSmarty::configuration();

}
 /**
     * Funzione che si occupa di visualizzare la pagina per l'aggiunta di un articolo
     * @throws SmartyException
     */
    public function showAllReviews(){
        $admin = FPersistentManager::getInstance()->retrieveObj(EAdmin::class,USession::getInstance()->getSessionElement('admin')->getId());
        $this->smarty->assign('admin',$admin);
        $this->smarty->display('allreviews.tpl');
    }
    /* da VSeller
    public function showSellerReviews(){
        $seller = FPersistentManager::getInstance()->retrieveObj(ESeller::class,USession::getInstance()->getSessionElement('seller')->getId());
        $this->smarty->assign('seller',$seller);
        $this->smarty->display('sellerreview.tpl');
    }*/
    
    /*
    public function showCustomerReviews(){
        $customer = FPersistentManager::getInstance()->retrieveObj(ECustomer::class,USession::getInstance()->getSessionElement('customer')->getId());
        $this->smarty->assign('customer',$customer);
        $this->smarty->display('customerreviews.tpl');
    }*/

}