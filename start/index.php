<?php

/*

1) Дано целое число (задать его функцией rand()). Если оно является положительным, то прибавить к нему 1; если отрицательным, то вычесть из него 2; если нулевым, то заменить его на 10. Вывести полученное число.

*/

$a = rand();
$b = 0;

if ($a > 0) {
    $b = $a + 1;
}

if ($a < 0) {
    $b = $a - 2;
}

if ($a == 0) {
    $b = 10;
}

echo "Задача №1: Случайное число = {$a} ♥♦♣♠ Результат = {$b}";

/*

2) Даны три целых числа (задать их функцией rand()). Найти количество положительных и количество отрицательных чисел в исходном наборе.

*/

$numArray = [rand() * (rand(0, 1) > 0) ? 1 : -1, rand() * (rand(0, 1) > 0) ? 1 : -1, rand() * (rand(0, 1) > 0) ? 1 : -1];

$plus = 0;
$minus = 0;

foreach ($numArray as $value) {
    if ($value > 0) {
        $plus++;
    }
    
    if ($value < 0) {
        $minus++;
    }
}

echo "\nЗадача №2: Положительные числа = {$plus} ♦♣♠♥ Отрицательные числа = {$minus}";


/*

3) Даны два числа (задать их функцией rand()). Вывести большее из них.

*/

$maxArray = [rand(), rand()];
$maxValue = max($maxArray);

echo "\nЗадача №3: Данные = {$maxArray[0]}, {$maxArray[1]} ♥♦♣♠ Результат = {$maxValue}";

/*

4) Дано целое число в диапазоне 1–7 (задать его функцией rand()). Вывести строку — название дня недели, соответствующее данному числу (1 — «понедельник», 2 — «вторник» и т. д.).

*/

$days = ['Понедельник', "Вторник", "Среда", "Четверг", "Пятница", "Суббота", "Воскресенье"];
$randDay = rand(1, 7);
$day = $days[$randDay - 1];

echo "\nЗадача №4: Номер дня = {$randDay} ♥♦♣♠  День = {$day}";