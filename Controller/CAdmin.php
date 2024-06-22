<?php

Class CAdmin{

    public static function dashboard(){
        if(CUser::isLogged()){
            $view = new VUser();
            $view->showUserDashboard();
            return;
        }
        else{
            $view = new VUser();
            $view->showLoginForm();
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
    public static function reviews($customer){

    }
    /*
    public static function ban(ECustomer $customer, int $days){

        $customer->setSuspensionTime($days);
    }*/
}