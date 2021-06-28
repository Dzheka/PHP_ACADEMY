
<?php

try {
    $conn = new PDO("mysql:host=localhost;dbname=countries_db", "root", "root");
    $statement = $conn->prepare("SELECT cities.id as id, cities.name as name, cities.population as population, cities.area as area, cities.people_den as people_den, country.name as country_name FROM `cities` join `countries` as country on country.id = cities.country_id order by id desc");

    $statement->execute();
    $cities = $statement->fetchAll(PDO::FETCH_ASSOC);

}catch(PDOException $e){
    echo $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <title>Countries</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <a href="./create.php" class="btn btn-success m-3">Add Country</a>
        <div class="row">
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Population</th>
                    <th>Country</th>
                    <th>Area</th>
                    <th>People Density</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($cities as $city):?>
                    <tr>
                        <td><?php echo $city["id"]?></td>
                        <td><?php echo $city["name"] ?></td>
                        <td><?php echo $city["population"] ?></td>
                        <td><?php echo $city["country_name"] ?></td>
                        <td><?php echo $city["area"] ?></td>
                        <td><?php echo $city["people_den"] ?></td>
                        <td>
                            <a href="info.php?id=<?php echo $city["id"] ?>" class="btn btn-secondary">Info</a>
                            <a href="edit.php?id=<?php echo $city["id"] ?>" class="btn btn-primary">Edit</a>
                            <a onclick="return confirm('Are sure delete this city?');" href="delete.php?id=<?php echo $city["id"]?>" class="btn btn-danger">delete</a>
                        </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
