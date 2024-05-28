<?php

require_once 'StartSmarty.php';
require_once 'autoload.php';
require_once 'config\config.php';

$smarty = StartSmarty::configuration();

$articolo = FPersistentManager::getInstance()->retrieveObj(EArticleDescription::class, "8032484007482");


$smarty->assign('username','Serafino69');
$smarty->assign('ean',$articolo->getId());
$smarty->assign('title',$articolo->getName());
$smarty->assign('artist',$articolo->getArtist());
$smarty->display('article.tpl');
