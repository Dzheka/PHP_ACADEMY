<?php

require "Employee.php";

use Employee\Employee;

$employee1 = new Employee();
$employee1->setName("Mahmud");
$employee1->setSalary(1000);
$employee1->setAge(65);

$employee2 = new Employee();
$employee2->setName("Jahongir");
$employee2->setSalary(10000);
$employee2->setAge(101);

echo $employee1->getName() . '<br/>';
echo $employee1->getAge() . '<br/>';
echo $employee1->getSalary() . '<br/>';

echo $employee2->getName() . '<br/>';
echo $employee2->getAge() . '<br/>';
echo $employee2->getSalary() . '<br/>';