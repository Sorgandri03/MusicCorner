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
            if(UHTTPMethods::isPostSet('EAN') && UHTTPMethods::isPostSet('product-name')){
                self::pullArticle();
            }
            else if(UHTTPMethods::isPostSet('EAN')){
                self::searchEAN();
            }
            else{
                $view = new VSeller();
                $view->showAddArticle();
            }
        }
        else {
            header('Location: MusicCorner/User/Login');
        }
    }
   
    public static function pullArticle(){
        $view = new VSeller();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['EAN']) && isset($_POST['product-name']) && isset($_POST['artist-name']) && isset($_POST['format'])  && isset($_POST['price']) && isset($_POST['quantity'])) {
                $EAN = UHTTPMethods::post('EAN');
                $name = UHTTPMethods::post('product-name');
                $artist = UHTTPMethods::post('artist-name');
                $formattext = UHTTPMethods::post('format');
                switch($formattext){
                    case 'CD':
                        $format = 0;
                        break;
                    case 'LP':
                        $format = 1;
                        break;
                }
                $price = UHTTPMethods::post('price');
                $quantity = UHTTPMethods::post('quantity');
            if(CUser::isLogged() && CUser::userType(USession::getSessionElement('seller')) == 'seller'){  
                $article = new EArticleDescription($EAN, $name, $artist, $format);
                $stock = new EStock($article->getId(), $quantity, $price, USession::getSessionElement('seller')->getId());
                $exists = FArticleDescription::getInstance()->existEAN($EAN);
                FPersistentManager::getInstance()->createObj($stock);
                if (!$exists) {
                    FPersistentManager::getInstance()->createObj($article);
                }
                self::showSuccessArticle();
            }else{
                header('Location: /MusicCorner/User/login');
                return;
            }   
            
            } else {
                
                return;
            }
        } else {
            
        }
    }

    public static function searchEAN() {
        $view = new VSeller();
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

    public static function showSuccessArticle(){
        if(CUser::isLogged() && CUser::userType(USession::getSessionElement('seller')) == 'seller'){
            $view = new VSeller();
            $view->showSuccessMessage();
        }
        else {
            header('Location: MusicCorner/User/Login');
        }
    }
    
    public static function showReviews(){
        if(CUser::isLogged() && CUser::userType(USession::getSessionElement('seller')) == 'seller'){
            $view = new VSeller();
            $view->showSellerReviews();
        }
        else {
            header('Location: MusicCorner/User/Login');
        }
    }

   public static function modifyStock(){
        if(CUser::isLogged() && CUser::userType(USession::getSessionElement('seller')) == 'seller'){
            $view = new VSeller();
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


    public static function soldProducts(){
        if(CUser::isLogged() && CUser::userType(USession::getSessionElement('seller')) == 'seller'){
            $view = new VSeller();
            $view->showSoldProducts();
        }
        else {
            header('Location: MusicCorner/User/Login');
        }
    }

    public static function review(){

    }
    public static function sendReview(){

    }
    public static function contact(){

    }

}