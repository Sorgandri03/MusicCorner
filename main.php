<?php

spl_autoload_register(function ($className) { 
    $filePath = __DIR__ . '/Entity/' . $className . '.php'; 
    if (file_exists($filePath)) 
    { require_once $filePath; } });

//$a = new ECustomer("1", "2", "3", "password");

$z=new EArticleDescription("1", "2", "3", "4", Format::CD);

$B= new ESeller("pippo.coca@dipre.it", "mussolini", "bellaRga");

$B->addStock("10", "10",$z);

$catalogue = $B->getCatalogue();
foreach ($catalogue as &$item) {
    echo $item->getArticle()->getName();
}

//print $a->getEmail();