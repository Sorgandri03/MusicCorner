<?php

Class CSeller{

    public static function dashboard(){
        if(CUser::isLogged() && CUser::userType(USession::getSessionElement('seller')) == 'seller'){
            $view = new VUser();
            $view->showUserDashboard();
            return;
        }
        else{
            header('Location: MusicCorner/User/Login');
        }
    }

   public static function addArticle(){
        if(CUser::isLogged() && CUser::userType(USession::getSessionElement('seller')) == 'seller'){
            $view = new VUser();
            $view->showAddArticle();
        }
        else {
            header('Location: MusicCorner/User/Login');
        }
    }

   public static function modifyStock(){
        if(CUser::isLogged() && CUser::userType(USession::getSessionElement('seller')) == 'seller'){
            $view = new VUser();
            $view->showModifyStock();
        }
        else {
            header('Location: MusicCorner/User/Login');
        }
   }
   public static function updateStock() {
    // Recupera i dati POST
    $stockId = UHTTPMethods::post('stockId');
    $price = UHTTPMethods::post('price');
    $quantity = UHTTPMethods::post('quantity');

    if (!is_numeric($price) || !is_numeric($quantity)) {
        echo "Errore: Price e Quantity devono essere valori numerici.";
        return;
    }

    $price = floatval($price);
    $quantity = intval($quantity);

    // Recupera lo stock dal database
    $persistentManager = FPersistentManager::getInstance();
    $stock = $persistentManager->retrieveObj('EStock', $stockId);

    // Verifica che lo stock esista
    if ($stock) {
        // Aggiorna i dettagli dello stock
        $stock->setPrice($price);
        $stock->setQuantity($quantity);

        // Salva le modifiche nel database
        $persistentManager->updateObj($stock);

        // Redirige alla pagina di gestione dello stock
        header('Location: /MusicCorner/Seller/modifyStock');
    } else {
        echo "Stock non trovato.";
    }
}

public static function removeFromStock() {
    // Recupera stockId dal POST
    $stockId = UHTTPMethods::post('stockId');

    // Recupera lo stock dal database
    $persistentManager = FPersistentManager::getInstance();
    $stock = $persistentManager->retrieveObj('EStock', $stockId);

    // Verifica che lo stock esista
    if ($stock) {
        // Rimuove lo stock dal database
        $persistentManager->deleteObj($stock);

        // Redirige alla pagina di gestione dello stock
        header('Location: /MusicCorner/Seller/modifyStock');
    } else {
        echo "Stock non trovato.";
    }
}




    public static function searchEAN() {
        $view = new VUser();
        $ean = UHTTPMethods::post('EAN');
        $exists = FPersistentManager::getInstance()->verifyEAN($ean);
        
        if ($exists) {
            $article = FPersistentManager::getInstance()->getArticleByEAN($ean);
            if ($article) {
                $view->addArticleSuccess($article);
            } else {
                $view->addArticleFail();
            }
        } else {
            $view->addArticleFail();
        }
    }
    
    public static function soldProducts(){

    }

    public static function review(){

    }
    public static function sendReview(){

    }
    public static function contact(){

    }

}