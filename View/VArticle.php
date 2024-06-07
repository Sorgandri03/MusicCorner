<?php

require_once 'StartSmarty.php';

class VArticle
{
    private $smarty;

    public function __construct(){

        $this->smarty = StartSmarty::configuration();

    }

    /**
     * @throws SmartyException
     */
    public function showArticle($article)
    {
        
        if(USession::getInstance()->isSetSessionElement('username')){
            $this->smarty->assign('username',USession::getInstance()->getSessionElement('username'));
        }
        else{
            $this->smarty->assign('username','Accedi/Registrati');
        }
        
        $this->smarty->assign('article', $article);
        $this->smarty->display('article.tpl');
    }
    
}