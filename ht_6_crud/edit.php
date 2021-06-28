<?php
try{
    $conn = new PDO("mysql:host=localhost;dbname=countries_db", "root", "root");
    $sql = "SELECT * FROM `cities` WHERE id=:id";
    $statement = $conn->prepare($sql);
    $statement->bindParam(":id", $_GET["id"]);
    $statement->execute();
    $city = $statement->fetch(PDO::FETCH_ASSOC);
}catch(PDOException $e){
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
    <title>Edit</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Edit</h1>
            <form action="update.php?id=<?= $city["id"];?>" method="post">
                <div class="form-group">
                    <label for="cityName">City Name</label>
                    <input id="cityName" name="cityName" type="text" class="form-control" value="<?php echo $city["name"]; ?>">
                </div>
                <div class="form-group">
                    <label for="population">Population</label>
                    <input id="population" name="population" type="text" class="form-control" value="<?php echo $city["population"]; ?>">
                </div>
                <div class="form-group">
                    <label for="area">Area</label>
<!--                    <input id="area" name="area" type="text" class="form-control" value="1234">-->
                    <input id="area" name="area" type="text" class="form-control" value="<?php echo $city["area"]; ?>">
                </div><br />
                <button class="btn btn-warning" type="submit">Edit</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>

