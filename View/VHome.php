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
    public function showLastArrivals($articles)
    {
        $randomIndex = array_rand($articles);
        $randomArticle = $articles[$randomIndex];

        $this->smarty->assign('username', 'Accedi');
        $this->smarty->assign('article', $randomArticle);
        $this->smarty->display('article.tpl');
    }
}