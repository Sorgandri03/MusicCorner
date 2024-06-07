<?php

require_once 'StartSmarty.php';
require_once 'autoload.php';
require_once 'config\config.php';

$smarty = StartSmarty::configuration();

$article = FPersistentManager::getInstance()->retrieveObj(EArticleDescription::class, "0196588460326");

$articles = FPersistentManager::getInstance()->searchArticles("21");

$smarty->assign('username','Accedi');
$smarty->assign('article',$article);
$smarty->assign('result',$articles);
$smarty->display('test.tpl');
