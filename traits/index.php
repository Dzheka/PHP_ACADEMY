<?php

require_once 'Employee.php';
require_once 'Country.php';
require_once 'Test.php';

$tom = new Employee();
$tom->setName('Tom');
$tom->setAge(21);
$tom->setSalary(5000);

echo "<br>" . $tom->getName();
echo "<br>" . $tom->getAge();
echo "<br>" . $tom->getSalary();

echo "<br><br>";

$tajikistan = new Country('Tajikistan', 1200, 9000000);
echo "<br>" . $tajikistan->getName();
echo "<br>" . $tajikistan->getAge();
echo "<br>" . $tajikistan->getPopulation();

echo "<br><br>";

$test = new Test();
echo $test->getSum();