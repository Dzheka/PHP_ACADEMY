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

    <?php
        include '../config.php';
//echo "<pre>";
//$url = $_SERVER['REQUEST_URI'];
//$id = parse_url($url);
//var_dump($id);

        $id = htmlspecialchars($_POST['cityId']);

        $result2 =  mysqli_query($link, 'select * from `cities` where `id` = '.$_POST['cityId']);
        $city = mysqli_fetch_all($result2);
//    echo "<pre>";
//    print_r($city);
//    die();

        foreach ($city as $value){
    ?>
        <form action="../crudControllers/updateCityPage.php" method="post">
            <input type="hidden"  name="cityId" value="<?php echo $value[0]?>">
           <p>City Name <input type="text"  name="name" value="<?php echo $value[1]?>"></p>
           <p>Population <input type="text"  name="population" value="<?php echo $value[2]?>"></p>
           <p>City Area<input type="text"  name="area" value="<?php echo $value[3]?>"> </p>
           <p> status<input type="text"  name="status" value="<?php echo $value[4]?>"> </p>
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