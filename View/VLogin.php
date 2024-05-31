<?php

require_once 'StartSmarty.php';

class VLogin
{
    private $smarty;

    public function __construct(){

        $this->smarty = StartSmarty::configuration();

    }

    /**
     * @throws SmartyException
     */
    public function showLogin()
    {
        $this->smarty->display('login.tpl');
    }
}