<?php

spl_autoload_register(function ($className) { 
    $filePath = __DIR__ . '/Entity/' . $className . '.php'; 
    if (file_exists($filePath)) 
    { require_once $filePath; } });


$z = new EArticleDescription("1", "2", "3", "4", Format::CD);

$B = new ESeller("pippo.coca@dipre.it", "mussolini", "bellaRga");

$a = new EStock($z, "10","10");

$B->addStock($z, "10","10");

$a = $B->getCatalogue();
foreach ($a as $key) {
    echo $key;
}

