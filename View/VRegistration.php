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
    public function showRegistrationCustomer($data = null)
    {
        if ($data) {
            $this->smarty->assign('username', $data['username']);
            $this->smarty->assign('email', $data['email']);
            $this->smarty->assign('password', $data['password']);
            $this->smarty->assign('confirmPassword', $data['confirm-password']);
        }
        $this->smarty->display('registrationcustomer.tpl');
    }

    public function handleCustomerSubmission()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $formData = [
                'username' => $_POST['username'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'confirm-password' => $_POST['confirm-password']
            ];

            // email validation?
            if ($formData['password'] !== $formData['confirm-password']) {
                // Passwords do not match, handle the error
                // For example, you can redirect to an error page or display an error message
                $this->registrationError();
                return;
            }
            $this->showRegistrationCustomer($formData);
        } else {
            // Display the form without any data (initial form load)
            $this->showRegistrationCustomer();
        }
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