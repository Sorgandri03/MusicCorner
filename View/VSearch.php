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
        $this->smarty = StartSmarty::configuration();
        $this->smarty->assign('username','Accedi');
        $this->smarty->assign('result', $result);
        $this->smarty->display('search.tpl');
    }
}