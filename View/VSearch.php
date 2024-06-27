<?php

require_once 'StartSmarty.php';

class VSearch
{
    private $smarty;

    public function __construct(){

        $this->smarty = StartSmarty::configuration();

    }

    /**
     * @throws SmartyException
     */
    public function showSearch($result)
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

        $this->smarty->assign('cart', $cart);
        $this->smarty->assign('result', $result);
        $this->smarty->display('search.tpl');
    }
    
    /**
     * @throws SmartyException
     */
    public function showArticle($article)
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

    public function showSellerHomepageFromCustomer($seller){
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