<?php

include_once "../classes/Product.php";

$delete = new Product();

$id = $_POST['id'] ?? null;

if (!$id) {
    header('Location: /');
}

$delete->setId($id);
$delete->delete();

