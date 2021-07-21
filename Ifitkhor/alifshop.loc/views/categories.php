<?php
include "../classes/Product.php";
$products = new Product();

if (isset($_GET['category'])) {
    $category = $_GET['category'];
    $row = $products::show($category);
} else {
    $search = $_GET['search'];
    $row = $products->search($search);
}

?>

<?php include_once "productContent.php" ?>