<?php

include "functions.php";

$positiveFile = fopen(__DIR__ . '/positive.list.csv', 'w');
$negativeFile = fopen(__DIR__ . '/negative.list.csv', 'w');
$errorFile = fopen(__DIR__ . '/error.list.csv', 'w');
$listFile = fopen(__DIR__ . '/action.list.csv', 'r');

$list = [];
$positive = [];
$negative = [];
$error = [];

while(($row = fgetcsv($listFile, null, ','))) {
    $list[] = $row;
}

foreach($list as $key => $row) {
    $result = calculate($row);
    if ($result > 0) {
        $positive += [$key+1 => $result];
    } elseif ($result < 0) {
        $negative += [$key+1 => $result];
    } elseif ($result != '0') {
        $error += [$key+1 => $result];
    }
}

dDump($positive, false);
dDump($negative, false);
dDump($error, false);

foreach($positive as $key => $value) {
    fputcsv($positiveFile, [$key, $value], ',');
}

foreach($negative as $key => $value) {
    fputcsv($negativeFile, [$key, $value], ',');
}

foreach($error as $key => $value) {
    fputcsv($errorFile, [$key, $value], ',');
}

fclose($listFile);

fclose($errorFile);
fclose($negativeFile);
fclose($positiveFile);