<?php

class Main {

    public function __construct() {
        $carta = FPersistentManager::getInstance()->retrieveObj(ECreditCard::class, 1234567890123456);
        FPersistentManager::getInstance()->deleteObj($carta);
    }

}



