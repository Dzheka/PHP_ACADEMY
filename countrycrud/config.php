<?php

ini_set("display_errors", TRUE); // On deploy change it to FALSE;

define("DB_NAME", "alif-academy");
define("DB_HOST", "localhost");
define("DB_USER", "default");
define("DB_PASS", "123456789");
define("DB_DSN", "mysql:host=". DB_HOST .";dbname=". DB_NAME);

const CORE = "core/";
const COUNTRY = CORE . "country.php";
const CITY = CORE . "city.php";
const DB = CORE . "PDOopt.php";

const TEMPLATER = CORE . "templater.php";
const TEMPLATES = "templates/";
const LIBRARY = "library/";

require(COUNTRY);
require(CITY);
require(DB);

function handleException($exp) {
    echo "Sorry, a problem ocured: ". $exp->getMessage();
    die();
}

set_exception_handler("handleException");