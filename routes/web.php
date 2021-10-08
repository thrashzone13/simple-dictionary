<?php

use Slim\App;
use WordnetBot\Http\Controllers\WordnetController;

return function (App $app) {
    $app->get('/', [WordnetController::class, 'index']);
    $app->get('/search', [WordnetController::class, 'search']);
};