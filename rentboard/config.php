<?php

ini_set("display_errors", TRUE);

const DB_HOST = "localhost";
const DB_USER = "default";
const DB_PASSWORD = "123456789";
const DB_NAME = "alif-academy";
const DB_DSN = "mysql:host=". DB_HOST .";dbname=". DB_NAME .";charset=uftmb4";

const CORE = "core/";
const TEMPLATES = "templates/";

function handleException($exp) {
    $page['error'] = $exp->getMessage();
    require(TEMPLATES. 'handleException.php');
    die();
}

set_exception_handler("handleException");