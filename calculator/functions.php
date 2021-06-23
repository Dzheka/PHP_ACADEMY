<?php

function dDump($data, $die = true) {
    echo '<pre>';
    var_dump($data);
    echo '</pre>';

    if ($die) die();
}

function cleanSpace($data) {
    $cleaned = [];
    foreach($data as $item) {
        $cleaned[] = trim($item, " ");
    }
    
    return $cleaned;
}

function calculate(array $data) {
    $result = 0;

    $data = cleanSpace($data);

    if (in_array('+', $data, true)) {
        unset($data[array_search('+', $data)]);
        $result = array_reduce(array_splice($data, 1), 'add', array_values($data)[0]);
    } elseif (in_array('-', $data, true)) {
        unset($data[array_search('-', $data)]);
        $result = array_reduce(array_splice($data, 1), 'subtract', array_values($data)[0]);
    } elseif (in_array('*', $data, true)) {
        if (!in_array('0', $data, true)) {
            unset($data[array_search('*', $data)]);
            $result = array_reduce(array_splice($data, 1), 'multiply', array_values($data)[0]);
        }
    } elseif (in_array('/', $data, true)) {
        if (in_array('0', array_splice($data, 1), true)) {
            return "Divided by 0";
        }

        if (!in_array('0', $data, true)) {
            unset($data[array_search('/', $data)]);
            $result = array_reduce(array_splice($data, 1), 'divide', array_values($data)[0]);
        }
    } else {
        return "Could not find action.";
    }
    return number_format($result, 0, '.', '');
}

function add($curr, $value) {
    $curr = (int)$curr + (int)$value;
    return $curr;
}

function subtract($curr, $value) {
    $curr = (int)$curr - (int)$value;
    return $curr;
}

function multiply($curr, $value) {
    $curr = (int)$curr * (int)$value;
    return $curr;
}

function divide($curr, $value) {
    $curr = (int)$curr / (int)$value;
    return $curr;
}