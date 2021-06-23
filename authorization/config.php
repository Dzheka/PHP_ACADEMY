<?php

ini_set("display_errors", TRUE);

define("DB_NAME", "alif-academy");
define("DB_HOST", "localhost");
define("DB_USER", "default");
define("DB_PASS", "123456789");
define("DB_DSN", "mysql:host=". DB_HOST .";dbname=". DB_NAME .";charset=utf8mb4");

const CORE = "core/";
const TEMPLATES = 'templates/';

require(CORE ."PDOopt.php");
require(CORE ."user.php");
require(CORE ."fileworker.php");

function handleException($exp) {
    echo "Sorry, a problem ocured: ". $exp->getMessage();
    die();
}

set_exception_handler("handleException");