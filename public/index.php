<?php

use Saphpi\Core\MySQL;
use Saphpi\Core\Application;
use Saphpi\Controllers\AuthController;
use Saphpi\Controllers\BookController;
use Saphpi\Controllers\GuestController;
use Saphpi\Controllers\BorrowedBookController;

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

$app->router()->get('/', [GuestController::class, 'homepage']);
$app->router()->get('/buku', [BookController::class, 'index']);
$app->router()->delete('/buku', [BookController::class, 'delete']);
$app->router()->get('/buku/simpan', [BookController::class, 'create']);
$app->router()->post('/buku/simpan', [BookController::class, 'handleCreate']);
$app->router()->get('/buku/peminjaman', [BorrowedBookController::class, 'borrow']);
$app->router()->post('/buku/peminjaman', [BorrowedBookController::class, 'handleBorrow']);
$app->router()->get('/buku/pengembalian', [BorrowedBookController::class, 'returnBook']);
$app->router()->patch('/buku/pengembalian', [BorrowedBookController::class, 'handleReturnBook']);

$app->run();
