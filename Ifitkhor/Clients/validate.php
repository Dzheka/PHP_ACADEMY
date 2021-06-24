<?php

$name = trim($_POST['name']);
$surname = trim($_POST['surname']);
$bio = trim($_POST['bio']);
$avatar = $_FILES['avatar']['name'];
$ip = $_SERVER["REMOTE_ADDR"];
$browser = $_SERVER["HTTP_USER_AGENT"];

if (!$name){
    $errors[] = "Значение поля имя не можеть быть пустым";
}
if (!$surname){
    $errors[] = "Значение поля surname не можеть быть пустым";
}