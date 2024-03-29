<?php
require __DIR__ . '/../vendor/autoload.php';
try {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../data');
    $dotenv->load();
    $dotenv->required([
        'SMTP_HOST',
        'SMTP_PORT',
        'SMTP_AUTH',
        'SMTP_USER',
        'SMTP_PASS',
        'SMTP_FROM',
        'MAILTO_EMAIL',
        'MAILTO_NAME'
    ]);
} catch (Exception $e) {
    echo 'Missing required environment variables.';
}
