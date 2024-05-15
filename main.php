<?php

class Main {

    public function __construct() {
        $articolo1 = new EArticleDescription('55', 'Spatalino Compilation', 'Enzo Spatalino', 'Progressive Rock', 0);
        FPersistentManager::getInstance()->createObj($articolo1);
        echo $articolo1->getFormat();
    }

}



