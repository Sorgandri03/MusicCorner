<?php

class Main {
    public function __construct() {
        $this->delete();
    }

    public function create() {
        $cart = FPersistentManager::getInstance()->retrieveObj(ECart::class, "2");
        $Order = new EOrder("serafino.cicerone@univaq.it", 4, "6795365485801134", $cart->getTotalPrice(), 2);
        FPersistentManager::getInstance()->createObj($Order);
    }

    public function retrieve() {
        $Order = FPersistentManager::getInstance()->retrieveObj(EOrder::class, "2");
        echo $Order->getPrice();
    }

    public function update() {
        $Order = FPersistentManager::getInstance()->retrieveObj(EOrder::class, "3");
        $Order->setCustomer("2");
        FPersistentManager::getInstance()->updateObj($Order);
    }

    public function delete() {
        $Order = FPersistentManager::getInstance()->retrieveObj(EOrder::class, "3");
        FPersistentManager::getInstance()->deleteObj($Order);
    }
}



