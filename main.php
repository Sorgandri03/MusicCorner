<?php

class Main {

    public function __construct() {
        $order = FPersistentManager::getInstance()->retrieveObj(EOrder::class, 1);
        echo $order->getOrderDateTime()->format('Y-m-d H:i:s');
    }

}



