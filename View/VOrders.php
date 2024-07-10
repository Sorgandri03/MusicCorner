<?php
require_once 'StartSmarty.php';
/**
 * This  View is responsible for rendering the cart, the order address, the order payment and the order confirmation pages in the MusicCorner application.
 * 
 */
class VOrders{
    private $smarty;
    public function __construct(){
        $this->smarty = StartSmarty::configuration();
    }

    /**
     * Show the user's cart
     * @throws SmartyException
     */
    public function showCart()
    {
        /**
         * Check if the user is a customer, a seller or an admin
         */
        if(USession::getInstance()->isSetSessionElement('customer')){
            /**
             * Get the customer
             */
            $customer = USession::getInstance()->getSessionElement('customer');
            $this->smarty->assign('username', $customer->getUsername());
            $this->smarty->assign('customer', true);
            /**
             * Check if the cart is already set
             */
            if(USession::getInstance()->isSetSessionElement($customer->getUsername())){
                $cart = USession::getInstance()->getSessionElement($customer->getUsername());
            }
            /**
             * Set the cart if it is not set
             */
            else{
                $cart = new ECart($customer->getId());
                USession::getInstance()->setSessionElement($customer->getUsername(),$cart);
            }
        }
        /**
         * Check if the user is a seller, get the shop name and set a placeholder cart
         */
        elseif(USession::getInstance()->isSetSessionElement('seller')){
            $this->smarty->assign('username',USession::getInstance()->getSessionElement('seller')->getShopName());
            $cart = new ECart('guest');
        }
        /**
         * Check if the user is a admin, get the mail and set a placeholder cart
         */
        elseif(USession::getInstance()->isSetSessionElement('admin')){
            $this->smarty->assign('username', explode("@", USession::getInstance()->getSessionElement('admin')->getId())[0]);
            $cart = new ECart('guest');
        }
        /**
         * If the user is not logged, set the username to 'Accedi/Registrati' and set a guest cart
         */
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
        COrders::checkCart();
        $this->smarty->assign('cart', $cart);
        $this->smarty->display('cart.tpl');
    }

    /**
     * Show the user's cart with an error message if he tries to add more items than available
     * @throws SmartyException
     */
    public function showCartQuantityError(){
        $this->smarty->assign('error', true);
        $this->showCart();
    }

    /**
     * Show the first step of the order process, where the user can choose the address to ship the order to
     * @throws SmartyException
     */
    public function showOrderAddress()
    {
        $cart = USession::getInstance()->getSessionElement('cart');
        $customer = FPersistentManager::getInstance()->retrieveObj(ECustomer::class, USession::getInstance()->getSessionElement('customer')->getId());
        $this->smarty->assign('customer', $customer);
        $this->smarty->assign('Format', Format);
        $this->smarty->assign('cart', $cart);
        $this->smarty->display('orderaddress.tpl');
    }

    /**
     * Show the order address form with an error message if the fields are not filled correctly
     * @throws SmartyException
     */
    public function showOrderAddressError()
    {
        $this->smarty->assign('error', true);
        $this->showOrderAddress();
    }
    
    /**
     * Show the last step of the order process, where the user can choose the card to pay the order with
     * @throws SmartyException
     */
    public function showOrderPayment()
    {
        $cart = USession::getInstance()->getSessionElement('cart');
        $customer = FPersistentManager::getInstance()->retrieveObj(ECustomer::class, USession::getInstance()->getSessionElement('customer')->getId());
        $this->smarty->assign('customer', $customer);
        $this->smarty->assign('Format', Format);
        $this->smarty->assign('cart', $cart);
        $this->smarty->display('orderpayment.tpl');
    }

    /**
     * Show the order payment form with an error message if the fields are not filled correctly
     * @throws SmartyException
     */
    public function showOrderPaymentError()
    {
        $this->smarty->assign('error', true);
        $this->showOrderPayment();
    }

    /**
     * Show the order confirmation page
     * @throws SmartyException
     */
    public function showOrderConfirm()
    {
        $this->smarty->assign('success', true);
        $this->showOrderPayment();
    }

    /**
     * Show the order confirmation page with an error message if some of the items fail to be ordered
     * @throws SmartyException
     */
    public function showOrderConfirmFailure()
    {
        $this->smarty->assign('error', true);
        $this->smarty->assign('totalerror', false);
        $this->showOrderPayment();
    }

    /**
     * Show the order confirmation page with an error message if the order fails
     * @throws SmartyException
     */
    public function showOrderConfirmTotalFailure()
    {
        $this->smarty->assign('error', false);
        $this->smarty->assign('totalerror', true);
        $this->showOrderPayment();
    }
}