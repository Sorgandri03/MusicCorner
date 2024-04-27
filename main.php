<?php

spl_autoload_register(function ($className) { 
    $filePath = __DIR__ . '/Entity/' . $className . '.php'; 
    if (file_exists($filePath)) 
    { require_once $filePath; } });

$a = new ECustomer("1", "2", "3", "password");

print $a->getEmail();