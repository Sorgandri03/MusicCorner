<?php
require_once 'StartSmarty.php';
/**
 * This view is responsible for displaying the user registration form and handling user input.
 */
class VRegistration
{
    private $smarty;
    public function __construct() {
        $this->smarty = StartSmarty::configuration();
    }

    /**
     * Show the registration choice, customer or seller
     * @throws SmartyException
     */
    public function showRegistration() {
        $this->smarty->display('registration.tpl');
    }

    /**
     * Show the customer registration form
     * @throws SmartyException
     */
    public function showRegistrationCustomer() {
        $this->smarty->display('registrationcustomer.tpl');
    }

    /**
     * Show the seller registration form
     * @throws SmartyException
     */
    public function showRegistrationSeller() {
        $this->smarty->display('registrationseller.tpl');
    }
    
    /**
     * Show the registration choice with the already existing email or username error message
     * @throws SmartyException
     */
    public function registrationError() {
        $this->smarty->assign('regErr',true);
        $this->smarty->assign('passwordError',false);
        $this->smarty->display('registration.tpl');
    }

    /**
     * Show the registration choice with the passwords not matching error message
     * @throws SmartyException
     */
    public function passwordError(){
        $this->smarty->assign('regErr',false);
        $this->smarty->assign('passwordError',true);
        $this->smarty->display('registration.tpl');
    }
}