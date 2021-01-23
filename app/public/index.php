<?php

use App\Core\Application;

require_once dirname(__DIR__) . "/vendor/autoload.php";

$app = new Application();

$app->get('/', function() {
    return 'Hello World';
});

$app->get('/contact', 'contact');

$app->run();