<?php
include "../classes/Product.php";

$search = $_GET['search'];
$products = new Product();
$row = $products::search($search);

?>

<?php include "productContent.php"; ?>