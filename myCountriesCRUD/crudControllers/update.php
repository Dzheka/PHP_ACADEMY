<?php
include '../config.php';
if ($_SERVER["REQUEST_METHOD"]=="POST") {

    $updateId =htmlspecialchars($_POST['updateId']);
    $updateName =htmlspecialchars($_POST['updateName']);
    if (empty($updateName)){
        echo 'write anythink';
    }
    else{
        mysqli_query($link, 'update `countries` set  `name`=" '.$updateName.'" where id ="'.$updateId.'" ' );
        redirect('http://localhost/countries/');
    }
}