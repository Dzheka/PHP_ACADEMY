<?php
require "../config.php";
include "../functions.php";

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: index.php');
}

$errors = [];
$btnValue = "Сохранить";

$stmt = mysqli_query($mysqli, "SELECT * FROM cities WHERE id = {$id}");

while ($row = mysqli_fetch_assoc($stmt)) {
    $cityName = $row['name'];
    $population = $row['population'];
    $area = $row['area'];
    $id = $row['id'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require "../validate.php";

    if (empty($errors)) {
        $statement = mysqli_prepare($mysqli, "UPDATE cities SET name = ?, population = ?, area = ?, density = ? WHERE id = ?");
        mysqli_stmt_bind_param($statement, "siddi", $cityName, $population, $area, $density, $id);
        mysqli_stmt_execute($statement);
        header("Location: index.php");
    }

//    mysqli_close($mysqli);

}


?>

<?php require "header.php"; ?>

<h1>Update City</h1>

<?php require "../form.php" ?>

<?php include "footer.php"; ?>
