<?php

use App\Controllers\AuthController;
use App\Core\Application;
use App\Controllers\SiteController;

$dirname = dirname(__DIR__);

require_once $dirname . "/vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable($dirname, '.env');
$dotenv->load();

$app = new Application();

$app->get('/', [SiteController::class, 'home']);

$app->get('/contact', [SiteController::class, 'contact']);

$app->post('/contact', [SiteController::class, 'handleContact']);

$app->get('/login', [AuthController::class, 'login']);
$app->post('/login', [AuthController::class, 'login']);

$app->get('/register', [AuthController::class, 'register']);
$app->post('/register', [AuthController::class, 'register']);

$app->run();
