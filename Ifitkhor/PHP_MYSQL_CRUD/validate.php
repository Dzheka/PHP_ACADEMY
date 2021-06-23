<?php
$cityName = trim($_POST['city_name']);
$population = $_POST['population'];
$area = $_POST['area'];

if ($population > 0 && $area > 0) {
    $density = $population / $area;
} else {
    $density = 0;
}

if (!$cityName) $errors[] = "Значение поля не может быть пустым";
if (!$population) $errors[] = "Значение поля не может быть пустым";
if (!$area) $errors[] = "Значение поля не может быть пустым";

if (is_numeric($cityName)){
    $errors[] = "";
}

if ($population && !is_numeric($population)){
    $errors[] = "Population";
}

if ($area && !is_numeric($area)){
    $errors[] = "Area";
}