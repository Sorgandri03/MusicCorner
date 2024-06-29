<?php

Class CAdmin{

    /**
     * Show the admin dashboard
     */
    public static function dashboard(){
        /**
         * Check if the user is logged and if it is an admin
         */
        if(CUser::isLogged() && CUser::userType(USession::getSessionElement('admin')) == 'admin'){
            $view = new VUser();
            $view->showUserDashboard();
            return;
        }
        /**
         * Redirect to login if the user is not logged or is not an admin
         */
        else{
            header('Location: /MusicCorner/User/login');
            return;
        }
    }

    /**
     * Show every review in the database
     */
    public static function moderateReviews(){
        /**
         * Check if the user is logged and if it is an admin
         */
        if(CUser::isLogged() && CUser::userType(USession::getSessionElement('admin')) == 'admin'){
            $reviews = FPersistentManager::getInstance()->retrieveAll(EReview::class);
            $view = new VAdmin();
            $view->showAllReviews($reviews);
        }
        /**
         * Redirect to login if the user is not logged or is not an admin
         */
        else {
            header('Location: /MusicCorner/User/Login');
        }
    }

    /**
     * Delete a review
     */
    public static function deleteReview(){
        /**
         * Check if the user is logged and if it is an admin
         */
        if(CUser::isLogged() && CUser::userType(USession::getSessionElement('admin')) == 'admin'){
            /**
             * Check if the admin sent the ban request
             */
            if(UHTTPMethods::isPostSet('days')){
                $days = UHTTPMethods::post('days');
                $review = FPersistentManager::getInstance()->retrieveObj(EReview::class, UHTTPMethods::post('review'));
                $customer = FPersistentManager::getInstance()->retrieveObj(ECustomer::class, $review->getCustomer());
                $customer->setBan($days);
                FPersistentManager::getInstance()->updateObj($customer);
                FPersistentManager::getInstance()->deleteObj($review);
                $view = new VAdmin();
                $view->showDeleteReviewSuccess($review);
            }
            /**
             * Check if the admin didn't send the ban request and the review is set
             */
            else if(UHTTPMethods::isPostSet('review')){
                $review = FPersistentManager::getInstance()->retrieveObj(EReview::class, UHTTPMethods::post('review'));
                $view = new VAdmin();
                $view->showDeleteReview($review);
            }
            /**
             * Redirect to 404 if the review is not set
             */
            else {
                header('Location: /MusicCorner/404');
            }
        }
        /**
         * Redirect to login if the user is not logged or is not an admin
         */
        else {
            header('Location: /MusicCorner/User/Login');
        }
    }
}