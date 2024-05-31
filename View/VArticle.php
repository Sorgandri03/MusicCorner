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
        
        $this->smarty->assign('username','Accedi');
        $this->smarty->assign('article', $article);
        $this->smarty->display('article.tpl');
    }
    
}