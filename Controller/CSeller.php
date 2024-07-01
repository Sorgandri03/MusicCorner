<?php
/**
 * Class that contains all the seller methods
 
 */
Class CSeller{
    /**
     * Show the seller dashboard
     */
    public static function dashboard(){
        /**
         * Check if the user is logged and if it is a seller
         */
        if(CUser::isLogged() && CUser::userType(USession::getSessionElement('seller')) == 'seller'){
            $view = new VSeller();
            $view->showDashboard();
            return;
        }
        /**
         * Redirect to login if the user is not logged or is not a seller
         */
        else{
            header('Location: /MusicCorner/User/Login');
        }
    }

    /**
     * Show the page to add an article to the catalogue
     */
    public static function addArticle(){
        /**
         * Check if the user is logged and if it is a seller
         */
        if(CUser::isLogged() && CUser::userType(USession::getSessionElement('seller')) == 'seller'){
            /**
             * Check if the seller submitted the article
             */
            if(UHTTPMethods::isPostSet('EAN') && UHTTPMethods::isPostSet('product-name')){
                self::pullArticle();
            }
            /**
             * Check if the seller searched for an EAN
             */
            else if(UHTTPMethods::isPostSet('EAN')){
                self::searchEAN();
            }
            /**
             * Show the add article page
             */
            else{
                $view = new VSeller();
                $view->showAddArticle();
            }
        }
        /**
         * Redirect to login if the user is not logged or is not a seller
         */
        else {
            header('Location: /MusicCorner/User/Login');
        }
    }
   
    /**
     * Handle the addition of a new article to the database.
     * Checks necessary POST parameters, verifies user authentication and authorization,
     * and creates the article and its stock entry in the database.
     */
    public static function pullArticle(){
        if(UHTTPMethods::ispostset('EAN') && UHTTPMethods::ispostset('product-name') && UHTTPMethods::ispostset('artist-name') && UHTTPMethods::ispostset('format')  && UHTTPMethods::ispostset('price') && UHTTPMethods::ispostset('quantity')) {
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
        /**
         * Check if the user is logged and if it is a seller
         */
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
            $view = new VSeller();
            $view->addArticleFail(null);
            return;
        }
    }

    /**
     * Search for an article by EAN, if it exists 
     */
    public static function searchEAN() {
        if(CUser::isLogged() && CUser::userType(USession::getSessionElement('seller')) == 'seller'){
            $view = new VSeller();
            $ean = UHTTPMethods::post('EAN');
            $exists = FPersistentManager::getInstance()->verifyEAN($ean);
            
            if ($exists) {
                $article = FPersistentManager::getInstance()->retrieveObj(EArticleDescription::class,$ean);
                if ($article) {
                    $view->addArticleSuccess($article);
                } else {
                    $view->addArticleFail($ean);
                }
            } else {
                $view->addArticleFail($ean);
            }
        }
        else {
            header('Location: /MusicCorner/User/Login');
        }
    }

    /**
     * Show the page with the success message for the article addition
     */
    public static function showSuccessArticle(){
        /**
         * Check if the user is logged and if it is a seller
         */
        if(CUser::isLogged() && CUser::userType(USession::getSessionElement('seller')) == 'seller'){
            $view = new VSeller();
            $view->showSuccessMessage();
        }
        else {
            header('Location: /MusicCorner/User/Login');
        }
    }
  
    /**
     * The page with the reviews of the seller
     */
    public static function showReviews(){
        /**
         * Check if the user is logged and if it is a seller
         */
        if(CUser::isLogged() && CUser::userType(USession::getSessionElement('seller')) == 'seller'){
            $view = new VSeller();
            $view->showSellerReviews();
        }
        else {
            header('Location: /MusicCorner/User/Login');
        }
    }

    /**
     * Show the page with the form to answer a review
     */
    public static function answerReview(){
        /**
         * Check if the user is logged and if it is a seller
         */
        if(CUser::isLogged() && CUser::userType(USession::getSessionElement('seller')) == 'seller'){
            if(UHTTPMethods::isPostSet('text')){
                $review = FPersistentManager::getInstance()->retrieveObj(EReview::class, UHTTPMethods::post('reviewId'));
                if($review->isAnswered()){
                    $view = new VSeller();
                    $view->showAnswerReviewSuccess();
                    return;
                }
                $oldtext = $review->getReviewText();
                $review->setReviewText($oldtext . "<br><br>RISPOSTA DEL VENDITORE<br>" . UHTTPMethods::post('text'));
                $review->setAnswered(true);
                FPersistentManager::getInstance()->updateObj($review);
                $view = new VSeller();
                $view->showAnswerReviewSuccess();
            }
            else if(UHTTPMethods::isPostSet('answer')){
                $review = FPersistentManager::getInstance()->retrieveObj(EReview::class, UHTTPMethods::post('answer'));
                if($review->isAnswered()){
                    $view = new VSeller();
                    $view->showAnswerReviewSuccess();
                }
                else{
                    $view = new VSeller();
                    $view->showAnswerReview($review);
                }   
            }
            else{
                $view = new V404();
                $view->show404();
            }            
        }
        else {
            header('Location: /MusicCorner/User/Login');
        }
    }

    /**
     * The page with the catalogue of the seller with the possibility to modify it
     */
    public static function modifyCatalogue(){
        /**
         * Check if the user is logged and if it is a seller
         */
        if(CUser::isLogged() && CUser::userType(USession::getSessionElement('seller')) == 'seller'){
            $view = new VSeller();
            $view->showModifyCatalogue();
        }
        else {
            header('Location: /MusicCorner/User/Login');
        }
    }

    /**
     * The method to update the stock of an article
     */
    public static function updateStock() {
        /**
         * Get the POST parameters
         */
        $stockId = UHTTPMethods::post('stockId');
        $price = UHTTPMethods::post('price');
        $quantity = UHTTPMethods::post('quantity');

        /**
         * Convert the parameters to the correct type
         */
        $price = floatval($price);
        $quantity = intval($quantity);

        /**
         * Retrieve the stock from the database
         */
        $stock = FPersistentManager::getInstance()->retrieveObj('EStock', $stockId);

        /**
         * Change the stock parameters
         */
        $stock->setPrice($price);
        $stock->setQuantity($quantity);

        /**
         * Save the updated stock
         */
        FPersistentManager::getInstance()->updateObj($stock);

        /**
         * Redirect to the catalogue page
         */
        header('Location: /MusicCorner/Seller/modifyCatalogue');
    }

    /**
     * The method to remove an article from the stock of the seller
     */
    public static function removeFromStock() {
        /**
         * Get the POST parameter
         */
        $stockId = UHTTPMethods::post('stockId');

        /**
         * Retrieve the stock from the database
         */
        $stock = FPersistentManager::getInstance()->retrieveObj('EStock', $stockId);

        /**
         * Delete the stock from the database
         */
        FPersistentManager::getInstance()->deleteObj($stock);

        /**
         * Redirect to the catalogue page
         */
        header('Location: /MusicCorner/Seller/modifyCatalogue');
    }

    /**
     * The recent orders recieved by the seller
     */
    public static function recentOrders(){
        /**
         * Check if the user is logged and if it is a seller
         */
        if(CUser::isLogged() && CUser::userType(USession::getSessionElement('seller')) == 'seller'){
            if(UHTTPMethods::isPostSet('orderItem')){
                $orderItem = FPersistentManager::getInstance()->retrieveObj('EOrderItem', UHTTPMethods::post('orderItem'));
                $orderItem->setShipped(true);
                FPersistentManager::getInstance()->updateObj($orderItem);
            }
            $view = new VSeller();
            $view->showRecentOrders();
        }
        /**
         * Redirect to login if the user is not logged or is not a seller
         */
        else {
            header('Location: /MusicCorner/User/Login');
        }
    }
}