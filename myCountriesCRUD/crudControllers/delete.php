<?php
include '../config.php';
if ($_SERVER["REQUEST_METHOD"]=="POST") {

    $deleteId =htmlspecialchars($_POST['deleteId']);

    if (empty($deleteId)){
        echo 'write anythink';
    }
    else{
        mysqli_query($link, 'DELETE FROM  `countries`  where id ="'.$deleteId.'" ' );
        redirect('http://localhost/countries/');
    }
}