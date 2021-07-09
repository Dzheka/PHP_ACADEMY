<?php

declare(strict_types = 1);

include "./classes/Employee.php";


$employee1 = new Employee('Iftikhor', 180, 1200);

echo $employee1->getSalary();

print_r($employee1);

