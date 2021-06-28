<?php
//print_r($_POST); die;
try{
    $id = $_GET["id"];
    $cityName = $_POST["cityName"];
    $population = $_POST["population"];
    $area = $_POST["area"];

    $conn = new PDO("mysql:host=localhost;dbname=countries_db", "root", "root");
    $sql = "UPDATE `cities` SET cities.name = '$cityName', cities.population = '$population', cities.area = '$area' WHERE id = '$id'";
    $statement = $conn->prepare($sql);
    $statement->execute();

    header("Location: /"); exit;
}catch(PDOException $e){
    echo $e->getMessage();
}