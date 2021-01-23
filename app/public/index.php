<?php

use App\Core\Application;

$dirname = dirname(__DIR__);

require_once $dirname . "/vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable($dirname, '.env');
$dotenv->load();

$app = new Application();

$app->get('/', 'home');

$app->get('/contact', 'contact');

$app->post('/contact', function() {
    return "Handling submitted data";
});

$app->run();