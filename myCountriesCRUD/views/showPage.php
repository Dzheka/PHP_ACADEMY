<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>



<table class="table" >
    <thead>
    <tr>
        <th>ID</th>
        <th>City Name</th>
        <th>Population </th>
        <th>City Area</th>
        <th>Status</th>
        <th>Controls</th>


    </tr>
    </thead>
    <tbody>

    <?php
    include '../config.php';
    $id = $_POST['countryId'];
    $query = mysqli_query($link, 'select *  from `cities` where `country_id`= "'.$id.'"');
    $cities = mysqli_fetch_all($query);
//    echo "<pre>";
//    var_dump($cities);
//        echo "<pre>";
//        die();

    foreach ($cities as $city) :

        ?>
        <tr>

            <td> <?php echo $city[0]; ?></td>
            <td  style="cursor: pointer">
                <a href="https:google.com"><?php  echo $city[1];?></a>
                <input type="hidden" name="id" value="<?php echo $city[1] ?>">
            </td>
            <td> <?php echo $city[2]; ?></td>
            <td> <?php echo $city[3]; ?></td>
            <td> <?php echo $city[4]; ?></td>

            <td>  <form action="editCityPage.php" method="post">
                    <input type="hidden" name="cityId" value="<?php echo $city[0]?>">
                    <button class="btn-primary"> edit </button>
                </form>

                <form action="crudControllers/delete.php" method="post">
                    <input type="hidden" name="deleteId" value="<?php echo $city[0]?>">
                    <button class="btn-danger"> delete </button>
                </form>
            </td>

        </tr>
    <?php
    endforeach;
    ?>
    </tbody>
</table>
</body>
</html>

