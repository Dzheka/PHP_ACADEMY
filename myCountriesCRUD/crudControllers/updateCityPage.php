<?php
include '../config.php';
if ($_SERVER["REQUEST_METHOD"]=="POST") {

    $cityId =htmlspecialchars($_POST['cityId']);
    $name = htmlspecialchars($_POST['name']);
    $population =htmlspecialchars($_POST['population']);
    $area =htmlspecialchars($_POST['area']);
    $status =htmlspecialchars($_POST['status']);


    if (empty($cityId)){
        echo 'write anythink';
    }
    else{

        mysqli_query($link, 'UPDATE cities SET name = "'.$name.'", 
        population = "'.$population.'", 
        area = "'.$area.'", 
        is_active = "'.$status.'" 
        WHERE id = "'.$cityId.'" ' );


        redirect('http://localhost/countries');
    }
}