<?php

require_once 'autoload.php';
require_once 'config\config.php';


$cart = New ECart("serafo");
$cart->addArticle(2, 1);
USession::getInstance()->setSessionElement('cart', $cart);
$frontController = new CFrontController();
$frontController->run($_SERVER['REQUEST_URI']);
