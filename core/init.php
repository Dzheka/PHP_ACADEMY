<?php
session_start();

$GLOBALS['config'] = [
    'mysql' => [
        'host' => 'localhost',
        'username' => 'root',
        'password' => 'Password',
        'db' => 'test',
    ],
    'remember' => [
        'cookie_name' => 'hash',
        'cookie_expiry' => 604800,
    ],
    'session' => [
        'session_name' => 'user',
    ],
];

spl_autoload_register(function ($class) {
    require_once 'classes/' . $class . '.php';
});

require_once 'functions/sanitize.php';
