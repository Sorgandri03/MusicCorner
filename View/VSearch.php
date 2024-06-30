<?php
require_once 'StartSmarty.php';
/**
 * This View is responsible for rendering the search page in the MusicCorner application.
 * 
 */
class VSearch
{
    private $smarty;
    public function __construct(){
        $this->smarty = StartSmarty::configuration();
    }

    /**
     * Show the search page
     * @param EArticleDescription[] $results The results of the search
     * @throws SmartyException
     */
    public function showSearch($results) {
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

        $this->smarty->assign('cart', $cart);
        $this->smarty->assign('result', $results);
        $this->smarty->display('search.tpl');
    }
    
    /**
     * Show the article page
     * @param EArticleDescription $article The article to show
     * @throws SmartyException
     */
    public function showArticle($article) {
        
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
        elseif(USession::getInstance()->isSetSessionElement('admin')){
            $this->smarty->assign('username', explode("@", USession::getInstance()->getSessionElement('admin')->getId())[0]);
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
        
        $this->smarty->assign('Format', Format);
        $this->smarty->assign('cart', $cart);
        $this->smarty->assign('article', $article);
        $this->smarty->display('article.tpl');
    }

    /**
     * Show the seller's homepage
     * @param ESeller $seller The seller to show the homepage
     * @throws SmartyException
     */
    public function showSellerHomepageFromCustomer($seller) {
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
        elseif(USession::getInstance()->isSetSessionElement('admin')){
            $this->smarty->assign('username', explode("@", USession::getInstance()->getSessionElement('admin')->getId())[0]);
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
        
        $this->smarty->assign('seller', $seller);
        $this->smarty->display('sellerhomepage.tpl');
    }
}