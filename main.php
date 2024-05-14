<?php

class Main {

    public function __construct() {
        $customer = FPersistentManager::getInstance()->retrieveObj(ECustomer::class, 'email');
        $customer->setUsername('customer');
        $customer->setPassword('customer');
        FPersistentManager::getInstance()->updateObj($customer);
    }

}



