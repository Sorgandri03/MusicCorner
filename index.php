<?php

require_once 'autoload.php';
require_once 'config\config.php';

/**
 * The front controller is started and the path is passed to it
 */
$frontController = new CFrontController();
$frontController->run($_SERVER['REQUEST_URI']);