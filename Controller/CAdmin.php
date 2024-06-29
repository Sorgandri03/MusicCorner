<?php

Class CAdmin{

    public static function dashboard(){
        if(CUser::isLogged() && CUser::userType(USession::getSessionElement('admin')) == 'admin'){
            $view = new VUser();
            $view->showUserDashboard();
            return;
        }
        else{
            header('Location: /MusicCorner/User/login');
            return;
        }
    }
    public static function customers(){
        $customers = FPersistentManager::getInstance()->retrieveAll(ECustomer::class);
        foreach($customers as $customer){
            echo $customer->getUsername();
        }
        return;
        /**
         * Pass customers to view
         */
    } 
    public static function moderateReviews(){
        if(CUser::isLogged() && CUser::userType(USession::getSessionElement('admin')) == 'admin'){
            $reviews = FPersistentManager::getInstance()->retrieveAll(EReview::class);
            $view = new VAdmin();
            $view->showAllReviews($reviews);
        }
        else {
            header('Location: /MusicCorner/User/Login');
        }
    }

    public static function deleteReview(){
        if(CUser::isLogged() && CUser::userType(USession::getSessionElement('admin')) == 'admin'){
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
            else if(UHTTPMethods::isPostSet('review')){
                $review = FPersistentManager::getInstance()->retrieveObj(EReview::class, UHTTPMethods::post('review'));
                $view = new VAdmin();
                $view->showDeleteReview($review);
            }
            else {
                header('Location: /MusicCorner/404');
            }
        }
        else {
            header('Location: /MusicCorner/User/Login');
        }
    }

}