<?php

include_once "../classes/Product.php";
$product = new Product();

if (isset($_POST['addProduct'])){
    $product->setProductName($_POST['product_name']);
    $product->setDescription($_POST['description']);
    $product->setPrice($_POST['price']);
    $product->setCategory($_POST['category']);
    $product->setGuarantee($_POST['guarantee']);
    $product->setModel($_POST['model']);
    $product->setManufacturer($_POST['manufacturer']);
    $product->setYearOfIssue($_POST['yearOfIssue']);

    $targetFile = '';
    if (isset($_FILES['product_image'])) {
        if (!file_exists('../uploads')){
            mkdir('../uploads');
        }
        $targetDir = "../uploads/";
        $targetFile = $targetDir . basename($_FILES["product_image"]["name"]);
        move_uploaded_file($_FILES['product_image']['tmp_name'], $targetFile);
        $product->setProductImage($targetFile);
    }


    $product->store();
}