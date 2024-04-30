<?php
require_once 'FArticleDescription.php';
require_once '..\Entity\EArticleDescription.php';

$a = new EArticleDescription("1234567890123", "The Wall", "Pink Floyd", "Rock", Format::CD);
$b= new FArticleDescription();
$b->saveObj($a);
