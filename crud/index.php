<?php
require "config.php";
include "functions.php";

$result = getCities($conn);

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
    <h1>Список городов</h1>
    <a href="create.php" class="btn btn-success mb-2">Добавить</a>
    <table class="table table-striped">
      <tr>
        <th>#</th>
        <th>Название</th>
        <th>Площадь</th>
        <th>Плотность</th>
        <th>Население</th>
        <th>Страна</th>
        <th>Статус</th>
        <th colspan="2">Действия</th>
      </tr>
        <?php
        $tr="";
        while($row = mysqli_fetch_assoc($result)) {
            $tr.="<tr>";
            $tr .= "<td>{$row['id']}</td>";
            $tr .= "<td>{$row['city_name']}</td>";
            $tr .= "<td>{$row['square']}</td>";
            $tr .= "<td>{$row['density']}</td>";
            $tr .= "<td>{$row['population']}</td>";
            $tr .= "<td>{$row['country_name']}</td>";
            if(!$row['is_active']) {
                $tr .= "<td><span class=\"badge bg-danger\">Заблокирован</span></td>";
            } else {
                $tr .= "<td><span class=\"badge bg-success\">Активен</span></td>";
            }
            $tr .= "<td><a href=\"update.php?id={$row['id']}\" class=\"btn btn-warning mb-2\">Изменить</a></td>";
            $tr .= "<td><a href=\"delete.php?id={$row['id']}\" class=\"btn btn-danger mb-2\">Удалить</a></td>";
            $tr.="</tr>";
        }
        echo $tr;
        ?>
    </table>
</body>
</html>