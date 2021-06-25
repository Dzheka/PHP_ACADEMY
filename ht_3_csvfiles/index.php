<?php

include "functions.php";

$positives = fopen("./files/positives.csv", "w");
$negatives = fopen("./files/negatives.csv", "w");
$errors = fopen("./files/errors.csv", "w");
$numbers = fopen("./files/numbers.csv", "r");

$positivesArr = [];
$negativesArr = [];
$errorsArr = [];
$numbersArr = [];


while (($data = fgetcsv($numbers, null, ",")) !== false) {
    $numbersArr[] = $data;
}

foreach ($numbersArr as $key=>$number){
    $res = calcuation($number);
    if ($res > 0) {
        $positivesArr += [$key+1 => $res];
    } elseif ($res < 0) {
        $negativesArr += [$key+1 => $res];
    } elseif ($res != '0') {
        $errorsArr += [$key+1 => $res];
    }
}



foreach($positivesArr as $key => $positive) {
    fputcsv($positives, [$key, $positive], ',');
}

foreach($negativesArr as $key => $negative) {
    fputcsv($negatives, [$key, $negative], ',');
}

foreach($errorsArr as $key => $error) {
    fputcsv($errors, [$key, $error], ',');
}

fclose($positives);
fclose($negatives);
fclose($errors);
fclose($numbers);