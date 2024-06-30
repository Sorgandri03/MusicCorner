<?php
require_once 'StartSmarty.php';
/**
 * Represents the view for the customer page.
 */

class VCustomer{
    private $smarty;

    public function __construct(){
        $this->smarty = StartSmarty::configuration();
    }

    /**
     * Show the customer dashboard
     * @throws SmartyException
     */
    public function showDashboard(){
        $this->smarty->assign('username',USession::getInstance()->getSessionElement('customer')->getUsername());
        $this->smarty->display('customer.tpl');
    }

    /**
     * Show the customer's orders
     * @throws SmartyException
     */
    public function showOrderList(){
        $customer = FPersistentManager::getInstance()->retrieveObj(ECustomer::class,USession::getInstance()->getSessionElement('customer')->getId());
        $this->smarty->assign('customer',$customer);
        $this->smarty->display('orderlist.tpl');
    }

    /**
     * Show the order details to the customer
     * @param EOrder $order The order to show
     * @throws SmartyException
     */
    public function showOrder($order){
        $this->smarty->assign('allowed',true);
        $this->smarty->assign('order',$order);
        $this->smarty->display('order.tpl');
    }

    /**
     * Show an error message if the order does not belong to the customer
     * @throws SmartyException
     */
    public function showOrderNotAllowed(){
        $this->smarty->display('order.tpl');
    }

    /**
     * Show the page to review an article
     * @param EOrderItem $orderItem The order item to review
     * @throws SmartyException
     */
    public function showReviewArticle($orderItem){
        $this->smarty->assign('customer', USession::getInstance()->getSessionElement('customer'));
        $this->smarty->assign('orderItem', $orderItem);
        $this->smarty->display('reviewarticle.tpl');
    }

    /**
     * Show an error message if the stars are not set
     * @param EOrderItem $orderItem The order item to review
     * @throws SmartyException
     */
    public function showReviewArticleError($orderItem){
        $this->smarty->assign('error', true);
        $this->smarty->assign('customer', USession::getInstance()->getSessionElement('customer'));
        $this->smarty->assign('orderItem', $orderItem);
        $this->smarty->display('reviewarticle.tpl');
    }

    /**
     * Show the success message after reviewing an article
     * @throws SmartyException
     */
    public function showReviewSuccess(){
        $this->smarty->assign('success', true);
        $this->smarty->display('reviewarticle.tpl');
    }

    /**
     * Show all the reviews submitted by the customer
     * @throws SmartyException
     */
    public function showCustomerReviews(){
        $customer = FPersistentManager::getInstance()->retrieveObj(ECustomer::class,USession::getInstance()->getSessionElement('customer')->getId());
        $this->smarty->assign('customer',$customer);
        $this->smarty->display('customerreviews.tpl');
    }
}