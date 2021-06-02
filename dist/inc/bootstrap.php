<?php
require __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../data');
$dotenv->load();
$dotenv->required([
    'SITE_KEY',
    'SECRET_KEY',
    'SMTP_DEBUG',
    'SMTP_HOST',
    'SMTP_PORT',
    'SMTP_AUTH',
    'SMTP_USER',
    'SMTP_PASS',
    'SMTP_FROM',
    'MAILTO_EMAIL',
    'MAILTO_NAME'
]);