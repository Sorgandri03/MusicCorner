
<?php
require_once 'StartSmarty.php';

class VUser
{
    private $smarty;

    public function __construct(){

        $this->smarty = StartSmarty::configuration();

    }

    /**
     * @throws SmartyException
     */
    public function showUserDashboard()
    {
        if(USession::getInstance()->isSetSessionElement('customer'))
            $this->smarty->assign('username',USession::getInstance()->getSessionElement('customer'));
        else
            $this->smarty->assign('username',USession::getInstance()->getSessionElement('seller'));       
    }
   public function showCustomerDashboard()
    {
        $this->smarty->display('customerDashboard.tpl');
    }
    public function showSellerDashboard()
    {
        $this->smarty->display('sellerDashboard.tpl');
    }

}
