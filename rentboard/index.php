<?php

require("config.php");

$act = (isset($_GET['act'])) ? $_GET['act'] : "";

switch($act) {
    case 'requests':
        requests();
        break;
    case 'services':
        services();
        break;
    case 'rules':
        rules();
        break;
    case 'contacts':
        contacts();
        break;
    default:
        index();
}

function index() {
    require(TEMPLATES. 'main.php');
}

function requests() {
    require(TEMPLATES. 'requests.php');
}

function services() {
    require(TEMPLATES. 'services.php');
}

function rules() {
    require(TEMPLATES. 'rules.php');
}

function contacts() {
    require(TEMPLATES. 'contacts.php');
}