<?php

class Main {

    public function __construct() {
        /*
        $z = new EArticleDescription("1", "2", "3", "4", Format::CD);

        $B = new ESeller("pippo.coca@dipre.it", "mussolini", "bellaRga");

        $a = new EStock($z, "10","10");

        $B->addStock($z, "10","10");

        $a = $B->getCatalogue();
        foreach ($a as $key) {
            echo $key;
        }
        */
        $leonardo = new ECustomer("leonardo", "lpint02@gmail.com", "password");
        $carta = new ECreditCard("4023000000000000", "05/25", 390, $leonardo, "Via san pio delle camere 9");
        FPersistentManager::getInstance()->uploadObj($carta);

    }

}



