<?php

Class CAdmin{

    public static function dashboard(){
        if(USession::isSetSessionElement('admin')){
            echo USession::getSessionElement('admin');
            return;
            //modifica l'header per andare nella dashboard del admin;
        }
        //mostra la view del login
        echo "no";
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
    public static function ban(ECustomer $customer, int $days){
        /**
         * 
         */
        $customer->setSuspensionTime($days);
    }
}