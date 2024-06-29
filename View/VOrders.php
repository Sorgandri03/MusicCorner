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
            $customer = USession::getInstance()->getSessionElement('customer');
            $this->smarty->assign('username', $customer->getUsername());
            $this->smarty->assign('customer', true);
            if(USession::getInstance()->isSetSessionElement($customer->getUsername())){
                $cart = USession::getInstance()->getSessionElement($customer->getUsername());
            }
            else{
                $cart = new ECart($customer->getId());
                USession::getInstance()->setSessionElement($customer->getUsername(),$cart);
            }
        }
        elseif(USession::getInstance()->isSetSessionElement('seller')){
            $this->smarty->assign('username',USession::getInstance()->getSessionElement('seller')->getShopName());
            $cart = new ECart('guest');
        }
        else{
            $this->smarty->assign('username','Accedi/Registrati');
            $this->smarty->assign('customer', true);
            if(USession::getInstance()->isSetSessionElement('cartguest')){
                $cart = USession::getInstance()->getSessionElement('cartguest');
            }
            else{
                $cart = new ECart('guest');
                USession::getInstance()->setSessionElement('cartguest',$cart);
            }
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
        $this->smarty->assign('error', true);
        $this->showOrderAddress();
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
    public function showOrderConfirm()
    {
        $this->smarty->assign('success', true);
        $this->showOrderPayment();
    }
}