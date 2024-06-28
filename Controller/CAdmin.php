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
            $view = new VAdmin();
            $view->showAllReviews();
        }
        else {
            header('Location: /MusicCorner/User/Login');
        }
    }

}