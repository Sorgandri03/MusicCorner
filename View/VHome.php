<?php

require_once 'StartSmarty.php';

/**
 * This view is responsible for rendering the Home page of the MusicCorner website.
 */
class VHome{
    private $smarty;

    public function __construct(){

        $this->smarty = StartSmarty::configuration();

    }

    /**
     * Show the home page
     * @throws SmartyException
     */
    public function showHome()
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
        
        $result = FPersistentManager::getInstance()->getRandomArticles(10);
        $this->smarty->assign('cart', $cart);
        $this->smarty->assign('result', $result);
        $this->smarty->display('home.tpl');
    }
}