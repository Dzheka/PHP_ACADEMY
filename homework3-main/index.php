<?php

include "functions.php";

$positives = fopen("positives.csv", "w");
$negatives = fopen("negatives.csv", "w");
$errors = fopen("errors.csv", "w");
$numbers = fopen("numbers.csv", "r");

$positives_array = [];
$negatives_array = [];
$errors_array = [];
$numbers_array = [];


while (($data = fgetcsv($numbers, null, ",")) !== false) {
    $numbers_array[] = $data;
}

foreach ($numbers_array as $key=>$number){
    $res = calcuation($number);
    if ($res > 0) {
        $positives_array += [$key+1 => $res];
    } elseif ($res < 0) {
        $negatives_array += [$key+1 => $res];
    } elseif ($res != '0') {
        $errors_array += [$key+1 => $res];
    }
}



foreach($positives_array as $key => $positive) {
    fputcsv($positives, [$key, $positive], ',');
}

foreach($negatives_array as $key => $negative) {
    fputcsv($negatives, [$key, $negative], ',');
}

foreach($errors_array as $key => $error) {
    fputcsv($errors, [$key, $error], ',');
}

fclose($positives);
fclose($negatives);
fclose($errors);
fclose($numbers);