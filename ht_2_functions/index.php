<?php
/*
 #1
 Дано целое число (задать его функцией rand()). Если оно является положительным, то прибавить к нему 1; если
 отрицательным, то вычесть из него 2; если нулевым, то заменить его на 10. Вывести полученное число.
*/

$number = rand(-50, 50);
echo "Рандомное число:  " . $number . "<br />";
echo isPositive($number);


function isPositive($number){
    if ($number > 0){
        $number += 1;
    }
    elseif ($number == 0){
        $number = 10;
    }
    else{
        $number -= 2;
    }
    return "Результат: " . $number;
}
/*
  #2
  Даны три целых числа (задать их функцией rand()). Найти количество положительных и количество отрицательных чисел в
  исходном наборе.
*/

echo "<hr />";

$num1 = rand(-40, 40);
$num2 = rand(-80, 80);
$num3 = rand(-70, 70);
echo "1-ое число: " . $num1 . "<br />";
echo "2-ое число: " . $num2 . "<br />";
echo "3-ье число: " . $num3 . "<br />";

echo countNumbers($num1, $num2, $num3) . "<br />";

function countNumbers($num1, $num2, $num3){
    $count = 0;
    $discount = 0;

    if ($num1 >= 0){
        $count++;
    }else{
        $discount++;
    }
    if($num2 >= 0){
        $count++;
    }else{
        $discount++;
    }
    if($num3 >= 0){
        $count++;
    }else{
        $discount++;
    }
    return ("Positive: " . $count . "<br /> Negative: ". $discount);
}
echo "<hr />";
/*
 #3
 Даны два числа (задать их функцией rand()). Вывести большее из них.
*/

$num1 = rand(-50, 50);
$num2 = rand(-50, 50);
echo "1-ое число: " . $num1 . "<br />";
echo "2-ое число: " . $num2 . "<br />";
echo maxNumber($num1, $num2);

function maxNumber($num1, $num2){
    if ($num1 > $num2){
        return "Наибольшое число: " . $num1;
    }elseif($num1 == $num2) {
        return "Оба числа равны";
    }else{
        return "Наибольшое число: " . $num2;
    }
}
echo "<hr />";
/*
  #4
  Дано целое число в диапазоне 1–7 (задать его функцией rand()). Вывести строку — название дня недели, соответствующее
  данному числу (1 — «понедельник», 2 — «вторник» и т. д.).
 */

$day = rand(1, 7);

echo $day . "<br />";
echo findDay($day);


function findDay($day){
    $result = 0;
    switch($day){
        case 1:
            $result = "Понидельник";
            break;
        case 2:
            $result = "Вторник";
            break;
        case 3:
            $result = "Среда";
            break;
        case 4:
            $result = "Четверг";
            break;
        case 5:
            $result = "Пятница";
            break;
        case 6:
            $result = "Суббота";
            break;
        case 7:
            $result = "Воскресенье";
            break;
    }
    return $result;
}
