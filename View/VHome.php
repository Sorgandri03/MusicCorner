<?php

require_once 'StartSmarty.php';

class VHome
{
    private $smarty;

    public function __construct(){

        $this->smarty = StartSmarty::configuration();

    }

    /**
     * @throws SmartyException
     */
    public function showHome()
    {
        $result = FPersistentManager::getInstance()->getRandomArticles(5);
        if(USession::getInstance()->isSetSessionElement('customer'))
            $this->smarty->assign('username',USession::getInstance()->getSessionElement('customer')->getUsername());
        else
            $this->smarty->assign('username','Accedi/Registrati');

        if(USession::getInstance()->isSetSessionElement('cart')){
            $cart = USession::getInstance()->getSessionElement('cart');
        }
        else{
            $cart = new ECart('guest');
            USession::getInstance()->setSessionElement('cart',$cart);
        }
            
        $this->smarty->assign('cart',$cart);
        $this->smarty->assign('result', $result);
        $this->smarty->display('home.tpl');
    }
}