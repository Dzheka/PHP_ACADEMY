<?php

class Employee
{
    private $name;
    private $age;
    private $salary;

    public function __construct($name, $age, $salary)
    {
        $this->setName($name);
        $this->setAge($age);
        $this->setSalary($salary);
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function getSalary()
    {
        return "$this->salary $";
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setAge($age)
    {
        if ($this->isAgeCorrect($age)) {
            $this->age = $age;
        }
    }

    public function setSalary($salary)
    {
        $this->salary = $salary;
    }

    private function isAgeCorrect($age): bool
    {
        return $age >= 1 && $age <= 100;
    }
}
