<?php
try{
    $conn = new PDO("mysql:host=localhost;dbname=countries_db", "root", "root");
    $sql = "DELETE FROM `cities` WHERE id=:id";
    $statement = $conn->prepare($sql);
    $statement->bindParam(":id", $_GET["id"]);
    $statement->execute();

    header('Location: /');
}catch (PDOException $e){
    echo $e->getMessage();
}
