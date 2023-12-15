<?php

use Saphpi\Core\MySQL;
use Saphpi\Core\Application;
use Saphpi\Controllers\AuthController;

require_once __DIR__ . '/../psr4_autoloader.php';

$env = parse_ini_file('../.env');
if ($env === false) {
    die('Failed to load .env file');
}

new MySQL(
    $env['DB_HOST'],
    $env['DB_PORT'],
    $env['DB_USERNAME'],
    $env['DB_PASSWORD'],
    $env['DB_SCHEMA']
);

$app = new Application();
$app->suppressWarning = false;

$app->router()->get('/signup', [AuthController::class, 'signUp']);
$app->router()->post('/signup', [AuthController::class, 'handleSignUp']);
$app->router()->get('/login', [AuthController::class, 'logIn']);
$app->router()->post('/login', [AuthController::class, 'handleLogIn']);
$app->router()->get('/logout', [AuthController::class, 'handleLogOut']);

$app->run();
