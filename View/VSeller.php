<?php
require_once 'StartSmarty.php';
class VSeller{
       
private $smarty;

public function __construct(){

    $this->smarty = StartSmarty::configuration();

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


    public function showModifyCatalogue(){
        USession::getInstance()->setSessionElement('seller',FPersistentManager::getInstance()->retrieveObj(ESeller::class,USession::getInstance()->getSessionElement('seller')->getId()));
        $seller = FPersistentManager::getInstance()->retrieveObj(ESeller::class,USession::getInstance()->getSessionElement('seller')->getId());
        $this->smarty->assign('seller',$seller);
        $this->smarty->display('modifycatalogue.tpl');
    }
    public function showModifyCatalogueError(){
        $seller = FPersistentManager::getInstance()->retrieveObj(ESeller::class,USession::getInstance()->getSessionElement('seller')->getId());
        $this->smarty->assign('seller',$seller);
        $this->smarty->assign('error',true);
        $this->smarty->display('modifycatalogue.tpl');
    }
    public function showModifyCatalogueSuccess(){
        $seller = FPersistentManager::getInstance()->retrieveObj(ESeller::class,USession::getInstance()->getSessionElement('seller')->getId());
        $this->smarty->assign('seller',$seller);
        $this->smarty->assign('success',true);
        $this->smarty->display('modifycatalogue.tpl');
    }

    public function showSellerReviews(){
        $seller = FPersistentManager::getInstance()->retrieveObj(ESeller::class,USession::getInstance()->getSessionElement('seller')->getId());
        $this->smarty->assign('seller',$seller);
        $this->smarty->display('sellerreview.tpl');
    }

    public function showAnswerReview($reviewId){
        $review = FPersistentManager::getInstance()->retrieveObj(EReview::class,$reviewId);
        $customer = FPersistentManager::getInstance()->retrieveObj(ECustomer::class,$review->getCustomer());
        $this->smarty->assign('review',$review);
        $this->smarty->assign('customer',$customer);
        $this->smarty->display('answerreview.tpl');
    }

    public function showAnswerReviewSuccess($reviewId){
        $this->smarty->assign('success',true);
        $this->showAnswerReview($reviewId);
    }

    public function showSoldProducts(){
        $seller = FPersistentManager::getInstance()->retrieveObj(ESeller::class,USession::getInstance()->getSessionElement('seller')->getId());
        $this->smarty->assign('seller',$seller);
        $this->smarty->display('soldproducts.tpl');
    }


}