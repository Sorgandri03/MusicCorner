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
        $reviews = FPersistentManager::getInstance()->retrieveAll(EReview::class);
        $this->smarty->assign('reviews',$reviews);
        $this->smarty->assign('admin',$admin);
        $this->smarty->display('allreviews.tpl');
    }
    

}