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
        $this->smarty->assign('result', $result);
        $this->smarty->display('search.tpl');
    }
    
    /**
     * @throws SmartyException
     */
    public function showArticle($article)
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
        
        $this->smarty->assign('Format', Format);
        $this->smarty->assign('cart', $cart);
        $this->smarty->assign('article', $article);
        $this->smarty->display('article.tpl');
    }
}