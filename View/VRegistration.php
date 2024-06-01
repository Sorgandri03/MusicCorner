<?php

require_once 'StartSmarty.php';

class VRegistration
{
    private $smarty;

    public function __construct(){

        $this->smarty = StartSmarty::configuration();

    }

    /**
     * @throws SmartyException
     */
    public function showRegistration()
    {
        $this->smarty->display('registration.tpl');
    }
}