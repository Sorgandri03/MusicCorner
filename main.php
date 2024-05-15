<?php

class Main {

    public function __construct() {
        $customer = FPersistentManager::getInstance()->retrieveObj(ECustomer::class, "francominchia@gmail.com");
        $carte = $customer->getCreditCards();
        for($i = 0; $i < count($carte); $i++){
            echo $carte[$i]->getId() . "\n";
        }
        $indirizzi = $customer->getAddresses();
        for($i = 0; $i < count($indirizzi); $i++){
            echo $indirizzi[$i]->getId() . "\n";
        }
    }

}



