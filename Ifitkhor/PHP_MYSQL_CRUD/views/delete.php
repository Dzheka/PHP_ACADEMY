<?php
require "../config.php";

$id = $_POST['id'] ?? null;

if (!$id){
    header('Location: index.php');
}

$statement = mysqli_prepare($mysqli,"DELETE FROM cities WHERE id = ?");
mysqli_stmt_bind_param($statement, 'i', $id);
mysqli_stmt_execute($statement);
header('Location: index.php');
