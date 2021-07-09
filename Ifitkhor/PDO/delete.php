<?php

require "dbconfig.php";

$id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM notes WHERE id = ?");

$stmt->execute([$id]);
header('Location: /');
