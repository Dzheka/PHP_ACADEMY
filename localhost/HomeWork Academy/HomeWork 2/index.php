<?php

function putDataToCsv($filePath, $data) {
    $file = fopen($filePath, 'w');
    fputs($file, implode('', $data));
    fclose($file);
}

function getDataFromCsv($filePath) {
    $file = fopen($filePath, 'r');
    $result = [];
    $row = 1;

    if ($file !== false) {
        while (($data = fgetcsv($file, 0, ",")) !== FALSE) {
            $result[$row] = $data;
            $row++;
        }
    }
    fclose($file);

    return $result;
}

function flatNumbers($array) {
    $result = [];
    foreach ($array as $index => $val) {
        $currentRowNumbers = [];
        $operation = null;

        foreach ($val as $value) {
            $value = trim($value);
            if (is_numeric($value)) {
                $currentRowNumbers[] = $value;
            } else {
                $operation = $value;
            }
        }

        $result[$index] = [
            'numbers' => $currentRowNumbers,
            'operation' => $operation,
        ];
    }

    return $result;
}

function calculateNumbers($numbers, $operation) {
    $sum = 0;
    $errorMessage = null;
    $dontHaveOperation = false;

    foreach ($numbers as $number) {
        switch ($operation) {
            case '+':
                $sum += $number;
                break;
            case '-':
                $sum -= $number;
                break;
            case '*':
                if ($sum == 0) {
                    $sum = 1 * $number;
                } else {
                    $sum *= $number;
                }
                break;
            case '/':
                if ($number == 0) {
                    $errorMessage = 'Деление на 0';
                    continue 2;
                }
                if ($sum == 0) {
                    $sum = $number / 1;
                } else {
                    $sum = $number / $sum;
                }
                break;
            default:
                $errorMessage = "Не известная операция: $operation";
                $dontHaveOperation = true;
                break;
        }
    }

    return [
        'sum' => $sum,
        'error' => $errorMessage,
        'dontHaveOperation' => $dontHaveOperation,
    ];
}

function calculateData($data) {
    $flattedNumbers = flatNumbers($data); // [1 => ['numbers' => [12, 23, 52, 512], 'operation' => '+'], 2 => ...]
    $result = [];

    foreach ($flattedNumbers as $index => $value) {
        $operation = $value['operation'];
        $numbers = $value['numbers'];
        $calculatedNumbers = calculateNumbers($numbers, $operation);

        $result[$index] = $calculatedNumbers;
    }
//    echo '<pre>';
//    print_r($result);
    return $result;
}

function saveDataToCsv($data) {
    $errorFile = 'errors.scv';
    $plusFile = 'plus.scv';
    $minusFile = 'minus.scv'; 

    $plusData = [];
    $minusData = [];
    $errorData = [];

    foreach ($data as $row => $item) {
        $sum = $item['sum'];
        $error = $item['error'];
        $dontHaveOperation = $item['dontHaveOperation'];

        if ($dontHaveOperation) {
            $errorData[] = "Строка $row; Ошибка: $error;" . PHP_EOL;
            continue;
        }

        if (!empty($error)) {
            $errorData[] = "Строка $row; Ошибка: $error; Сумма: $sum;" . PHP_EOL;
        }

        if ($sum > 0) {
            $plusData[] = "Строка: $row; Сумма: $sum;" . PHP_EOL;
        } elseif ($sum == 0) {
            $plusData[] = "Строка: $row; Сумма: $sum;" . PHP_EOL;
        } elseif ($sum < 0) {
            $minusData[] = "Строка: $row; Сумма: $sum;" . PHP_EOL;
        }
    }
    if (!empty($plusData)) putDataToCsv($plusFile, $plusData);
    if (!empty($minusData)) putDataToCsv($minusFile, $minusData);
    if (!empty($errorData)) putDataToCsv($errorFile, $errorData);
}

$filePath = 'calculyator.csv';
$dataFromCsv = getDataFromCsv($filePath);
$calculatedData = calculateData($dataFromCsv);

saveDataToCsv($calculatedData);

echo 'Данные успешно обработаны и сохранены!';