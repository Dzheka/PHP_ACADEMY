<?php
include_once "Classes/RequestsPost.php";

$requestsPost=new RequestsPost();
if (isset($_POST['submit'])){
    $requestsPost->setFulName($_POST['ful_name']);
    $requestsPost->setPhoneNumber($_POST['phone_number']);
    $requestsPost->setPassportNumber($_POST['passport_number']);
    $requestsPost->setProductName($_POST['product_name']);
    $requestsPost->setProductPrice($_POST['product_price']);
    $requestsPost->setProductGuarantee($_POST['product_guarantee']);
    $requestsPost->add();

} elseif (isset($_POST['update'])) {
    $requestsPost->setId($_GET['id']);
    $requestsPost->setFulName($_POST['ful_name']);
    $requestsPost->setPhoneNumber($_POST['phone_number']);
    $requestsPost->setPassportNumber($_POST['passport_number']);
    $requestsPost->setProductName($_POST['product_name']);
    $requestsPost->setProductPrice($_POST['product_price']);
    $requestsPost->setProductGuarantee($_POST['product_guarantee']);
    $requestsPost->update();
}elseif ($_GET['send'] === 'delete') {
    $requestsPost->setId($_GET['id']);
    $requestsPost->Delete();
}