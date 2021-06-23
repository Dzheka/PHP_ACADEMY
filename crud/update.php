<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 21.06.2021
 * Time: 15:05
 */
include 'functions.php';
include 'config.php';
$id = $_GET['id'];
if (!isset($id)) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

$city = getCityById($id, $conn);
$countries = getCountries($conn);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'id' => $id,
        'city_name' => $_POST['city_name'],
        'population' => $_POST['population'],
        'square' => $_POST['square'],
        'dencity' => $_POST['population'] / $_POST['square'],
        'country_id' =>$_POST['country_id']
    ];

    updateCity($data, $conn);

    header('Location: index.php');
}

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <title>Document</title>
</head>
<body>
    <form action="#" method="POST">
        <div class="m-2">
            <label>Название: <input type="text" name="city_name" value="<?= $city['city_name']; ?>"></label>
        </div>
        <div class="m-2">
            <label>Площадь:  <input type="text" name="square" value="<?= $city['square']; ?>"></label>
        </div>
        <div class="m-2">
            <label>Население:  <input type="text" name="population" value="<?= $city['population']; ?>"></label>
        </div>
        <div class="m-2">
            <label>
                Страна
                <select name="country_id">
                    <?php
                    while($row = mysqli_fetch_assoc($countries)) {
                        if($row['id'] == $city['id']) {
                            echo "<option value='{$row['id']}' selected>{$row['name']}</option>";
                        } else {
                            echo "<option value='{$row['id']}'>{$row['name']}</option>";
                        }
                    }
                    ?>
                </select>
            </label>
        </div>
        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>
</body>
</html>
