<?php
require_once "config.php";

$errors = [];
$name = '';
$surname = '';
$bio = '';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    require "validate.php";


    if (isset($_FILES['avatar'])) {
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($_FILES["avatar"]["name"]);
        move_uploaded_file($_FILES['avatar']['tmp_name'], $targetFile);
    }

    if (empty($errors)) {
        if (!$statement = mysqli_prepare($link, "INSERT INTO clients(name, surname, bio, avatar, ip, browser) VALUES(?,?,?,?,?,?)")) {
            echo "An Error occur";
        }
        mysqli_stmt_bind_param($statement, "ssssss", $name, $surname, $bio, $targetFile, $ip, $browser);
        mysqli_stmt_execute($statement);

        mysqli_close($link);
        header('Location: index.php');
    }
}


?>

<?php include "header.php"; ?>

    <h1>Register User</h1>

<?php require_once "form.php"; ?>

<?php include "footer.php"; ?>