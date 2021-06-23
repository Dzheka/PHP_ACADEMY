<?php
/*
 #1
 Дано целое число (задать его функцией rand()). Если оно является положительным, то прибавить к нему 1; если
 отрицательным, то вычесть из него 2; если нулевым, то заменить его на 10. Вывести полученное число.
*/
echo "<h3>Task 1</h3> <p> Дано целое число (задать его функцией rand()). Если оно является положительным, то прибавить к нему 1; если
 отрицательным, то вычесть из него 2; если нулевым, то заменить его на 10. Вывести полученное число.</p>" . "<br />";
$number = rand(-50, 50);
echo "Рандомное число:  " . $number . "<br />";

if ($number > 0){
    echo "Результат: " . $number += 1;
}
if ($number == 0){
    echo "Результат: " . $number = 10;
}
if ($number < 0){
    echo "Результат: " . $number += 2;
}

/*
  #2
  Даны три целых числа (задать их функцией rand()). Найти количество положительных и количество отрицательных чисел в
  исходном наборе.
*/

echo "<br />" . "<h3>Task 2</h3> <p>Даны три целых числа (задать их функцией rand()). Найти количество положительных и количество отрицательных чисел в
  исходном наборе.</p>" . "<br />";

$num1 = rand(-40, 40);
$num2 = rand(-80, 80);
$num3 = rand(-70, 70);
echo "1-ое число: " . $num1 . "<br />";
echo "2-ое число: " . $num2 . "<br />";
echo "3-ье число: " . $num3 . "<br />";
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
echo "Количество положительных чисел " . $count . "<br />";
echo "Количество отрицательных чисел " . $discount;


/*
 #3
 Даны два числа (задать их функцией rand()). Вывести большее из них.
*/
echo "<br />" . "<h3>Task 3</h3> <p>Даны два числа (задать их функцией rand()). Вывести большее из них.</p>" . "<br />";

$num1 = rand(-50, 50);
$num2 = rand(-50, 50);
echo "1-ое число: " . $num1 . "<br />";
echo "2-ое число: " . $num2 . "<br />";
if ($num1 > $num2){
    echo "Наибольшое число: " . $num1;
}elseif($num1 == $num2) {
    echo "Оба числа равны";
}else{
    echo "Наибольшое число: " . $num2;
}

/*
  #4
  Дано целое число в диапазоне 1–7 (задать его функцией rand()). Вывести строку — название дня недели, соответствующее
  данному числу (1 — «понедельник», 2 — «вторник» и т. д.).
 */
echo "<br />" . "<h3>Task 4</h3> <p>Дано целое число в диапазоне 1–7 (задать его функцией rand()). Вывести строку — название дня недели, соответствующее
  данному числу (1 — «понедельник», 2 — «вторник» и т. д.).</p>" . "<br />";

$day = rand(1, 7);
$result = 0;
echo $day . "<br />";
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
echo $result;
