<?php
require_once 'StartSmarty.php';
class VAdmin{
       
private $smarty;

public function __construct(){

    $this->smarty = StartSmarty::configuration();

}
 /**
     * Funzione che si occupa di visualizzare la pagina per l'aggiunta di un articolo
     * @throws SmartyException
     */
    public function showAllReviews(){
        $this->smarty->display('allreviews.tpl');
    }


}