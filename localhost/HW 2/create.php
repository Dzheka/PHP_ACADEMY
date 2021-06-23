<?php
$db = mysqli_connect('localhost','root','root','farabd');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <title>Document</title>
</head>
<body>
<h1>Create Table</h1>
<form action="">
    <?php
    $query = "SELECT * FROM `tables`;";
    $result = mysqli_query($db, $query);
    while($row = mysqli_fetch_assoc($result)) {
        // Display your datas on the page
    }
    ?>
</form>
</body>
</html>