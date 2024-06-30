<?php
require_once 'StartSmarty.php';
/** 
 * This view is responsible for managing administrative tasks in the application.
 * It provides methods for handling user management, access control, and other administrative functions.
 */ 

class VAdmin{
    private $smarty;

    public function __construct(){
        $this->smarty = StartSmarty::configuration();
    }

    /**
     * Show the admin dashboard
     * @throws SmartyException
     */
    public function showDashboard(){
        $this->smarty->assign('username',USession::getInstance()->getSessionElement('admin')->getId());
        $this->smarty->display('admin.tpl');
    }

    /**
     * Show every review in the database
     * @param array $reviews array of reviews
     * @throws SmartyException
     */
    public function showAllReviews($reviews){
        $this->smarty->assign('reviews',$reviews);
        $this->smarty->display('allreviews.tpl');
    }
    
    /**
     * Show the page to delete a review and suspend the customer
     * @param EReview $review review to delete
     * @throws SmartyException
     */
    public function showDeleteReview($review){
        $customer = FPersistentManager::getInstance()->retrieveObj(ECustomer::class,$review->getCustomer());
        $this->smarty->assign('customer',$customer);
        $this->smarty->assign('review',$review);
        $this->smarty->display('deletereview.tpl');
    }

    /**
     * Show the success message after deleting a review
     * @throws SmartyException 
     */
    public function showDeleteReviewSuccess(){
        $this->smarty->assign('success',true);
        $this->smarty->display('deletereview.tpl');
    }
}