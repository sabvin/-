<?php

define('DIR_ROOT', dirname(__FILE__));
require __DIR__ . '/../Components/Autoload.php';

$router = new \Controllers\Router();
$router->run();
