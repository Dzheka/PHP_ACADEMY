<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 21.06.2021
 * Time: 15:06
 */
include "functions.php";
include "config.php";

$id = $_GET['id'];
if (!isset($id)) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
deleteCity($id, $conn);
header('Location: index.php');
