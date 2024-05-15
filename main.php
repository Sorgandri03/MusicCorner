<?php

class Main {
    public function __construct() {
        $cart = FPersistentManager::getInstance()->retrieveObj(ECart::class, 1);
        $array = $cart->getCartItems();
        echo count($array);


    }
}



