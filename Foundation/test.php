<?php
require_once 'FDB.php';
require_once '..\Entity\EArticleDescription.php';

$a = new EArticleDescription("1234567890123", "The Wall", "Pink Floyd", "Rock", Format::CD);
$b= FDB::getinstance();
$b->create($a);
