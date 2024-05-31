<?php

require_once 'StartSmarty.php';

class V404
{
    private $smarty;

    public function __construct(){

        $this->smarty = StartSmarty::configuration();

    }

    /**
     * @throws SmartyException
     */
    public function show404()
    {
        if(USession::getInstance()->isSetSessionElement('username')){
            $this->smarty->assign('username',USession::getInstance()->getSessionElement('username'));
        }
        else{
            $this->smarty->assign('username','Accedi/Registrati');}

        if(USession::getInstance()->isSetSessionElement('cart')){
            $this->smarty->assign('cart',USession::getInstance()->getSessionElement('cart'));
        
        }else{
            $cart = new ECart('guest');
            $this->smarty->assign('cart',$cart);
            }
            
        $this->smarty->display('Smarty\templates\404.tpl');
    }
}