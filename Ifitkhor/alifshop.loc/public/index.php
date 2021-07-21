<?php
session_start();

$errors = [];
$name =  $_SESSION['name'];

//if (empty($_SESSION)){
//    echo "<h1>User not found</h1>";
//} else {
//    echo "<h1>Welcome {$name}</h1>";
//}

?>

<?php include_once "../templates/header.php"; ?>
<?php include_once "../views/header.php"; ?>

<div class="container" data-id="content">
    <div class="row row-cols-1 row-cols-md-4" id="container">
        <?php include_once "../views/categories.php" ?>
    </div>
</div>

<?php include "../views/form.php"; ?>
<?php include_once "../templates/footer.php"; ?>

<script src="../js/app.js"></script>
