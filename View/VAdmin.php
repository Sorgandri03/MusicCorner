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
    public function showAllReviews($reviews){
        $this->smarty->assign('reviews',$reviews);
        $this->smarty->display('allreviews.tpl');
    }
    
    public function showDeleteReview($review){
        $customer = FPersistentManager::getInstance()->retrieveObj(ECustomer::class,$review->getCustomer());
        $this->smarty->assign('customer',$customer);
        $this->smarty->assign('review',$review);
        $this->smarty->display('deletereview.tpl');
    }

    public function showDeleteReviewSuccess(){
        $this->smarty->assign('success',true);
        $this->smarty->display('deletereview.tpl');
    }

}