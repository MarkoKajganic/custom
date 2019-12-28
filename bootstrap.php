<?php

$routes = require_once __DIR__ . '/routes.php';
$dbConfig = require_once __DIR__. '/config.php';

$connection = new Connection($dbConfig);

return new App(Router::getController($routes), $connection);