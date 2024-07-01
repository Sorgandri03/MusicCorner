<?php
require_once 'StartSmarty.php';
/**
 * This view is responsible for rendering the seller dashboard, the article adding form, the catalogue, the reviews and the recent orders pages in the MusicCorner application.
 * 
 */
class VSeller{

private $smarty;

public function __construct(){
    $this->smarty = StartSmarty::configuration();
}

    /**
     * Show the seller dashboard
     * @throws SmartyException
     */
    public function showDashboard(){
        $this->smarty->assign('username',USession::getInstance()->getSessionElement('seller')->getShopName());
        $this->smarty->display('seller.tpl');
    }

    /**
     * Show the article adding form
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
     * Show the article adding form with some already filled fields because the article was found
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
     * Show the article adding form with an error message because the article was not found
     * @throws SmartyException
     */
    public function addArticleFail($ean) {
        $seller = FPersistentManager::getInstance()->retrieveObj(ESeller::class,USession::getInstance()->getSessionElement('seller')->getId());
        $this->smarty->assign('formats', Format);
        $this->smarty->assign('success', "false");
        $this->smarty->assign('EAN', $ean);
        $this->smarty->assign('seller',$seller);
        $this->smarty->assign('found',"false");
        $this->smarty->display('addarticle.tpl');
    }

    /**
     * Show the article added successfully message
     * @throws SmartyException
     */
    public function showSuccessMessage() {
        $this->smarty->assign('success', "true");
        $this->smarty->assign('found',"finish");
        $this->smarty->display('addarticle.tpl');
    }   

    /**
     * Show the catalogue of the seller with the possibility to modify it
     * @throws SmartyException
     */
    public function showModifyCatalogue(){
        USession::getInstance()->setSessionElement('seller',FPersistentManager::getInstance()->retrieveObj(ESeller::class,USession::getInstance()->getSessionElement('seller')->getId()));
        $seller = FPersistentManager::getInstance()->retrieveObj(ESeller::class,USession::getInstance()->getSessionElement('seller')->getId());
        $this->smarty->assign('seller',$seller);
        $this->smarty->display('modifycatalogue.tpl');
    }

    /**
     * Show the seller's reviews
     * @throws SmartyException
     */
    public function showSellerReviews(){
        $seller = FPersistentManager::getInstance()->retrieveObj(ESeller::class,USession::getInstance()->getSessionElement('seller')->getId());
        $this->smarty->assign('seller',$seller);
        $this->smarty->display('sellerreview.tpl');
    }

    /**
     * Show the form to answer a review
     * @param EReview $review
     * @throws SmartyException
     */
    public function showAnswerReview($review){
        $customer = FPersistentManager::getInstance()->retrieveObj(ECustomer::class,$review->getCustomer());
        $this->smarty->assign('review',$review);
        $this->smarty->assign('customer',$customer);
        $this->smarty->display('answerreview.tpl');
    }

    /**
     * Show the success message after answering a review
     * @throws SmartyException
     */
    public function showAnswerReviewSuccess(){
        $this->smarty->assign('success',true);
        $this->smarty->display('answerreview.tpl');
    }

    /**
     * Show the recent orders that customer to the seller
     * @throws SmartyException
     */
    public function showRecentOrders(){
        $seller = FPersistentManager::getInstance()->retrieveObj(ESeller::class,USession::getInstance()->getSessionElement('seller')->getId());
        $this->smarty->assign('seller',$seller);
        $this->smarty->display('recentorders.tpl');
    }
}