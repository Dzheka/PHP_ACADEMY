<?php

include "Employee.php";

$user = new Employee();
$user->setName('Umed');
echo $user->getName();
$user->setAge(25);
echo $user->getAge();
$user->setSalary(3000);
echo $user->getSalary();