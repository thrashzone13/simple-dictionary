<?php

use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$routes = require __DIR__ . '/../routes/web.php';
$routes($app);

$app->run();
