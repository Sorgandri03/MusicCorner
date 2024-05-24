<?php

require_once 'autoload.php';
require_once 'main.php';
require_once 'config\config.php'; 


$frontController = new CFrontController();
$frontController->run($_SERVER['REQUEST_URI']);


//new main();