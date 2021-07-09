<?php

include "Employee.php";

$user = new Employee();
$user->setName('Umed');
echo $user->getName();
echo "<br>";
$user->setAge(102);
echo $user->getAge();
echo "<br>";
$user->setSalary(3000);
echo $user->getSalary();