<?php

try{
    $conn = new PDO("mysql:host=localhost;dbname=clients_db", "root", "root");
    $sql = "SELECT * FROM `clients`";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $clients = $statement->fetchall(PDO::FETCH_ASSOC);

}catch(PDOException $e){
    echo $e->getMessage();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Home</title>
</head>
<body>
<div class="container">
    <div class="row">
        <a href="./create.php"><button class="btn btn-success mt-3 mb-3">Add User</button></a>
        <table class="table ">
            <thead class="table-dark">
            <tr>
                <td>Name</td>
                <td>Surname</td>
                <td>Avatar</td>
                <td>Bio</td>
                <td>IP</td>
                <td>Browser</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($clients as $client): ?>
            <tr>
                <td><?php echo $client["name"]?></td>
                <td><?php echo $client["surname"]?></td>
                <td><img src="./temp/<?php echo $client["avatar"]?>" /></td>
                <td><?php echo $client["bio"]?></td>
                <td><?php echo $client["ip"]?></td>
                <td><?php echo $client["browser"]?></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>


