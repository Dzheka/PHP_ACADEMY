<?php

try{
    $conn = new PDO("mysql:host=localhost;dbname=countries_db", "root", "root");
    $sql = "INSERT INTO `cities` (`name`, `population`, `country_id`, `area`) VALUES (:cityName, :population, :countryID, :area); UPDATE `cities` SET `cities`.`people_den` = ROUND(`cities`.`population` / `cities`.`area`, 4) WHERE `id`;";
    $statement = $conn->prepare($sql);
    $statement->bindParam(":cityName", $_POST["cityName"]);
    $statement->bindParam(":population", $_POST["population"]);
    $statement->bindParam(":countryID", $_POST["countryID"]);
    $statement->bindParam(":area", $_POST["area"]);
    $statement->execute();

    header("Location: /"); exit;
}catch (PDOException $e){
    echo $e->getMessage();
}