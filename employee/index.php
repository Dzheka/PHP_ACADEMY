<?php

include "Employee.php";

$user = new Employee();
$user->setName('Umed');
$user->getName();
$user->setAge(25);
$user->getAge();
$user->setSalary(3000);
$user->getSalary();