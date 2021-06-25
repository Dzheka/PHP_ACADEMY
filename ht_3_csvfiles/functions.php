<?php

function dDie($array){
    echo '<pre>';
    var_dump($array);
    echo '</pre>';
}

function plus($curr, $value){
    $curr += $value;
    return $curr;
}

function minus($curr, $value){
    $curr -= $value;
    return $curr;
}

function mult($curr, $value){
    $curr = $curr * $value;
    return $curr;
}

function div($curr, $value){
    $curr = $curr / $value;
    return $curr;
}

function calcuation(array $array)
{
    $res = 0;
    if (in_array("+", $array, true)) {
        unset($array[array_search("+", $array)]);
        $res = array_reduce(array_splice($array, 1), 'plus', array_values($array)[0]);
    }elseif(in_array("-", $array, true)){
        unset($array[array_search("-", $array)]);
        $res = array_reduce(array_splice($array, 1), 'minus', array_values($array)[0]);
    }elseif(in_array("*", $array, true)){
        if(!in_array("0", $array, true)){
            unset($array[array_search('*', $array)]);
            $res = array_reduce(array_splice($array, 1), 'mult', array_values($array)[0]);
        }
    }elseif (in_array('/', $array, true)) {
        if (!in_array('0', $array, true)) {
            unset($array[array_search('/', $array)]);
            $res = array_reduce(array_splice($array, 1), 'div', array_values($array)[0]);
        }
    } else {
        return "Action is not defined";
    }
    return number_format($res, 0, '.', '');
}