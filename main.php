<?php

spl_autoload_register(function ($className) { 
    $filePath = __DIR__ . '/Entity/' . $className . '.php'; 
    if (file_exists($filePath)) 
    { require_once $filePath; } });

$a = new EArticleDescription("ean", "name", "artist", "genre", Format::Cassette);

print $a->getFormat();