<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


<!--<input type="text" value="">-->
    <?php
        include '../config.php';
//echo "<pre>";
//$url = $_SERVER['REQUEST_URI'];
//$id = parse_url($url);
//var_dump($id);

        $id = htmlspecialchars($_POST['countryId']);

        $result2 =  mysqli_query($link, 'select * from `countries` where `id` = '.$_POST['countryId']);
        $show2 = mysqli_fetch_all($result2);
    echo "<pre>";
    print_r($show2);
    die();


        foreach ($show2 as $value2){
    ?>
        <form action="../crudControllers/update.php" method="post">
<!--            <input type="text"  name="updateId" value="--><?php //echo $value2[0]?><!--">-->
            <input type="text"  name="updateName" value="<?php echo $value2[1]?>">
        <button>send</button>
        </form>

    <?php
        }
    ?>

</body>
</html>

<!--GET      /countries      index
GET      /countries/10   show
PATCH    /countries/10   update
DELETE   /countries/10   delete-->