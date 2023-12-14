<?php

use Saphpi\Core\Application;
use Saphpi\Controllers\AuthController;

require_once __DIR__ . '/../psr4_autoloader.php';

$app = new Application();
$app->suppressWarning = false;

$app->router()->get('/signup', [AuthController::class, 'signUp']);
$app->router()->post('/signup', [AuthController::class, 'handleSignUp']);

$app->run();
