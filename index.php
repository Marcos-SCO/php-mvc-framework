<?php

use App\Core\Application;

require_once __DIR__ . "/vendor/autoload.php";

$app = new Application();

$app->get('/', function() {
    return 'Hello World';
});

$app->run();