<?php

class Main {
    public function __construct() {
        CPlaceOrders::addToCart(4, 1);
    }


    /*
    public function create() {
        $Message = new EMessage("viniciomaurizio@musiccorner.it", "petricola@petricolastore.it", "ciao");
        FPersistentManager::getInstance()->createObj($Message);
    }

    public function retrieve() {
        $admin = FPersistentManager::getInstance()->retrieveObj(ESeller::class, "petricola@petricolastore.it");
        foreach ($admin->getSentMessages() as $message){
            echo $message->getText() . "\n";
        }
        foreach ($admin->getReceivedMessages() as $message){
            echo $message->getText() . "\n";
        }
        
    }

    public function update() {
        $Message = FPersistentManager::getInstance()->retrieveObj(EMessage::class, "1");
        $Message->setText("aaaaaaaaaaaaaaah");
        FPersistentManager::getInstance()->updateObj($Message);
    }

    public function delete() {
        $Message = FPersistentManager::getInstance()->retrieveObj(EMessage::class, "1");
        FPersistentManager::getInstance()->deleteObj($Message);
    }
    */
}



