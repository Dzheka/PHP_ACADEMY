<?php
require "../config.php";
include "../functions.php";

$errors = [];
$btnValue = "Добавить";
$cityName = '';
$population = '';
$area = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require "../validate.php";

    if (empty($errors)) {
        if(!$statement = mysqli_prepare($mysqli, "INSERT INTO cities(name, population, area, density) VALUES (?, ?, ?, ?)")){
            echo "You have an Error in your sql zapros";
            die();
        }
        mysqli_stmt_bind_param($statement, "sidd", $cityName, $population, $area, $density);
        mysqli_stmt_execute($statement);
        header("Location: index.php");
    }

   mysqli_close($mysqli);
}

?>

<?php include "header.php"; ?>

<h1>Добавить новый город</h1>

<?php require "../form.php" ?>

<?php include "footer.php"; ?>
