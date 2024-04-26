<?php
use Entity\EArticleDescription;
use Entity\EStock;
use Entity\Format;

$a = new EArticleDescription("1", "name", "artist", "genre", Format::CD);
$stock = new EStock($a, 10, 19.99);
echo $stock->getArticle()->getEan(); // 1
