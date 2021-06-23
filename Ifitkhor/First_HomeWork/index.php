<?php

/* 
1) Дано целое число (задать его функцией rand()). Если оно является положительным, то прибавить к нему 1; если отрицательным, то вычесть из него 2; если нулевым, то заменить его на 10. Вывести полученное число 
*/

echo "/*================================*/";
echo "<br>Задача номер №1<br>";
echo "/*================================*/";

$randomNumber =  rand(-100, 100);
$num = $randomNumber;

if ($randomNumber > 0) {
  $num++;
}

if ($randomNumber === 0) {
  $num = 10;
}

if($randomNumber < 0){
  $num -= 2;
}


echo "<br><br>";
echo "Random Number = {$randomNumber} <b>|----|</b> Result = {$num}" . '<br><br>';

/* 
2) Даны три целых числа (задать их функцией rand()). Найти количество положительных и количество отрицательных чисел в исходном наборе. 
*/

echo "/*================================*/";
echo "<br>Задача номер №2<br>";
echo "/*================================*/";
echo "<br><br>";

$randomNums = [rand(-100, 100), rand(-100, 100), rand(-100, 100)];

$positiveNums = 0;
$negativeNums = 0;

foreach ($randomNums as $num) {
  echo "$num |<br>";
  if ($num > 0) {
    $positiveNums++;
  }
  if ($num < 0) {
    $negativeNums++;
  }
}

echo "<b>Positive numbers: {$positiveNums}</b><br>";
echo "<b>Negative numbers: {$negativeNums}</b><br><br>";


/*
3) Даны два числа (задать их функцией rand()). Вывести большее из них.
*/

echo "/*================================*/";
echo "<br>Задача номер №3<br>";
echo "/*================================*/";
echo "<br><br>";

$firstNum = rand(-1000, 1000);
$secondNum = rand(-1000, 1000);

echo "<b>First number: {$firstNum} <br /></b>";
echo "<b>Second number: {$secondNum} <br /></b>";

echo $firstNum > $secondNum ? "<h2>Greater is: {$firstNum}</h2>" : "<h2>Greater is: {$secondNum}</h2>";



/* ==================================== */
// 4) Дано целое число в диапазоне 1–7 (задать его функцией rand()). Вывести строку — название дня недели, соответствующее данному числу (1 — «понедельник», 2 — «вторник» и т. д.).
/* =================================== */
echo "/*================================*/";
echo "<br>Задача номер №4<br>";
echo "/*================================*/";
echo "<br><br>";


$randDay = rand(1, 7);

switch ($randDay) {
  case '1':
    echo "{$randDay} = Понедельник";
    break;
  case '2':
    echo "{$randDay} = Вторник";
    break;
  case '3':
    echo "{$randDay} = Среда";
    break;
  case '4':
    echo "{$randDay} = Четверг";
    break;
  case '5':
    echo "{$randDay} = Пятница";
    break;
  case '6':
    echo "{$randDay} = Суббота";
    break;
  case '7':
    echo "{$randDay} = Воскресенье";
    break;
  
  default:
    echo "{$randDay} = 7шанбе";
    break;
}

?>
