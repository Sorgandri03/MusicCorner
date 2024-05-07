<?php
require_once 'FPersistentManager.php';
require_once '..\Entity\EArticleDescription.php';

FPersistentManager::getInstance()->retrieveObject(EArticleDescription::class, 1);
