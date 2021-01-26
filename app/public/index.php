<?php

use App\Controllers\AuthController;
use App\Core\Application;
use App\Controllers\SiteController;

$dirname = dirname(__DIR__);

require_once $dirname . "/vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable($dirname, '.env');
$dotenv->load();

$config = [
    'userClass' => \App\Models\User::class,
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ],
];

date_default_timezone_set('America/Sao_Paulo');

$app = new Application(dirname(__DIR__), $config);

$app->get('/', [SiteController::class, 'home']);

$app->get('/contact', [SiteController::class, 'contact']);

$app->post('/contact', [SiteController::class, 'handleContact']);

$app->get('/login', [AuthController::class, 'login']);
$app->post('/login', [AuthController::class, 'login']);

$app->get('/register', [AuthController::class, 'register']);
$app->post('/register', [AuthController::class, 'register']);

$app->run();
