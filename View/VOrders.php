<?php

require_once 'StartSmarty.php';

class VOrders
{
    private $smarty;

    public function __construct(){

        $this->smarty = StartSmarty::configuration();

    }

    /**
     * @throws SmartyException
     */
    public function showCart()
    {
        if(USession::getInstance()->isSetSessionElement('customer')){
            $this->smarty->assign('username',USession::getInstance()->getSessionElement('customer')->getUsername());
        }
        else{
            $this->smarty->assign('username','Accedi/Registrati');
        }
        if(USession::getInstance()->isSetSessionElement('cart')){
            $cart = USession::getInstance()->getSessionElement('cart');
        }
        else{
            $cart = new ECart('guest');
            USession::getInstance()->setSessionElement('cart',$cart);
        }

        $this->smarty->assign('cart', $cart);
        $this->smarty->display('cart.tpl');
    }

    /**
     * @throws SmartyException
     */
    public function showCartQuantityError(){
        $this->smarty->assign('error', true);
        $this->showCart();
    }

    /**
     * @throws SmartyException
     */
    public function showOrderAddress()
    {
        if(USession::getInstance()->isSetSessionElement('cart')){
            $cart = USession::getInstance()->getSessionElement('cart');
        }
        else{
            $cart = new ECart('guest');
            USession::getInstance()->setSessionElement('cart',$cart);
        }

        $customer = FPersistentManager::getInstance()->retrieveObj(ECustomer::class, USession::getInstance()->getSessionElement('customer')->getId());

        $this->smarty->assign('customer', $customer);
        $this->smarty->assign('Format', Format);
        $this->smarty->assign('cart', $cart);
        $this->smarty->display('orderaddress.tpl');
    }

    /**
     * @throws SmartyException
     */
    public function showOrderAddressError()
    {
        if(USession::getInstance()->isSetSessionElement('cart')){
            $cart = USession::getInstance()->getSessionElement('cart');
        }
        else{
            $cart = new ECart('guest');
            USession::getInstance()->setSessionElement('cart',$cart);
        }

        $customer = FPersistentManager::getInstance()->retrieveObj(ECustomer::class, USession::getInstance()->getSessionElement('customer')->getId());

        $this->smarty->assign('customer', $customer);
        $this->smarty->assign('Format', Format);
        $this->smarty->assign('cart', $cart);
        $this->smarty->assign('error', true);
        $this->smarty->display('orderaddress.tpl');
    }
    
    /**
     * @throws SmartyException
     */
    public function showOrderPayment()
    {
        if(USession::getInstance()->isSetSessionElement('cart')){
            $cart = USession::getInstance()->getSessionElement('cart');
        }
        else{
            $cart = new ECart('guest');
            USession::getInstance()->setSessionElement('cart',$cart);
        }

        $customer = FPersistentManager::getInstance()->retrieveObj(ECustomer::class, USession::getInstance()->getSessionElement('customer')->getId());

        $this->smarty->assign('customer', $customer);
        $this->smarty->assign('Format', Format);
        $this->smarty->assign('cart', $cart);
        $this->smarty->display('orderpayment.tpl');
    }

    /**
     * @throws SmartyException
     */
    public function showOrderPaymentError()
    {
        $this->smarty->assign('error', true);
        $this->showOrderPayment();
    }

    /**
     * @throws SmartyException
     */
    public function showOrderPaymentErrorTerms()
    {
        if(USession::getInstance()->isSetSessionElement('cart')){
            $cart = USession::getInstance()->getSessionElement('cart');
        }
        else{
            $cart = new ECart('guest');
            USession::getInstance()->setSessionElement('cart',$cart);
        }

        $customer = FPersistentManager::getInstance()->retrieveObj(ECustomer::class, USession::getInstance()->getSessionElement('customer')->getId());

        $this->smarty->assign('errorTerms', true);
        $this->smarty->assign('customer', $customer);
        $this->smarty->assign('Format', Format);
        $this->smarty->assign('cart', $cart);
        $this->smarty->display('orderpayment.tpl');
    }
}