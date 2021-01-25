<?php

use App\Core\Application;

$dirname = __DIR__;

require_once $dirname . "/vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable($dirname, '.env');
$dotenv->load();

$config = [
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ],
];

$app = new Application(__DIR__, $config['db']);

$app->db->applyMigrations();
