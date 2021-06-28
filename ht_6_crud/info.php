
<?php

try{
    $conn = new PDO("mysql:host=localhost;dbname=countries_db", "root", "root");
    $sql = "select cities.id as id, cities.name as name, cities.population as population, cities.area as area, cities.people_den as people_den, c.name as country_name from cities join countries c on c.id = cities.country_id where cities.id=:id";
    $statement = $conn->prepare($sql);
    $statement->bindParam(":id", $_GET["id"]);
    $statement->execute();
    $city = $statement->fetch(PDO::FETCH_ASSOC);

}catch (PDOException $e){
    echo $e->getMessage();
}
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Create</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>City info</h1>
            <table class="table">
                <tr><td><b>Name:</b> <?= $city["name"] ?></td></tr>
                <tr><td><b>Country:</b> <?= $city["country_name"] ?></td></tr>
                <tr><td><b>Area:</b> <?= $city["area"] ?> км<sup>2</sup></td></tr>
                <tr><td><b>Population:</b> <?= $city["population"] ?> чел.</td></tr>
                <tr><td><b>People density:</b> <?= $city["people_den"] ?> чел/км<sup>2</sup></td></tr>
            </table>

        </div>
    </div>
</div>
</body>
</html>
