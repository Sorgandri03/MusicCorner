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
        if(USession::getInstance()->isSetSessionElement('username'))
            $this->smarty->assign('username',USession::getInstance()->getSessionElement('username'));
        else
            $this->smarty->assign('username','Accedi/Registrati');

        $this->smarty->display('home.tpl');
    }
}