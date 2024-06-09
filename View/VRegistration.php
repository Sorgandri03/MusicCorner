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
    public function showRegistrationCustomer()
    {
        $this->smarty->display('registrationcustomer.tpl');
    }
    public function showRegistrationSeller()
    {
        $this->smarty->display('registrationseller.tpl');
    }
    public function registrationError() {
        $this->smarty->assign('regErr',true);
        $this->smarty->display('registration.tpl');
    }
}