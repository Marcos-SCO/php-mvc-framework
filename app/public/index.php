<?php

use App\Core\Application;
use App\Controllers\SiteController;

$dirname = dirname(__DIR__);

require_once $dirname . "/vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable($dirname, '.env');
$dotenv->load();

$app = new Application();

$app->get('/', 'home');

$app->get('/contact', [SiteController::class, 'contact']);

$app->post('/contact', [SiteController::class, 'handleContact']);

$app->run();
