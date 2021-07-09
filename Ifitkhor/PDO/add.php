<?php

require_once "dbconfig.php";

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$note = $_POST['note'];
$query = "INSERT INTO `notes`(`note`) VALUES (:note)";

$stmt = $pdo->prepare($query);
$stmt->execute(['note' => $note]);
header('Location: /');