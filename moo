#!/usr/bin/env php
<?php

use Saphpi\Core\MySQL;
use Saphpi\Core\Prompt;

require_once __DIR__ . '/psr4_autoloader.php';

$env = parse_ini_file('.env');
if ($env === false) {
    die('Failed to load .env file');
}

define('ROOT', __DIR__);

new MySQL(
    $env['DB_HOST'],
    $env['DB_PORT'],
    $env['DB_USERNAME'],
    $env['DB_PASSWORD'],
    $env['DB_SCHEMA']
);

$prompt = new Prompt();
$prompt->resolve();
