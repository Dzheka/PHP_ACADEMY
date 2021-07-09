<?php

class Employee
{
    private $name;
    private $age;
    private $salary;


    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }


    public function getAge()
    {
        return $this->age;
    }


    public function setAge($age)
    {
        if ($this->IsAgeCorrect($age)) {
            $this->age = $age;
        }
    }


    public function getSalary()
    {
        return $this->salary . "$";
    }


    public function setSalary($salary)
    {
        $this->salary = $salary;
    }


    private function isAgeCorrect($age)
    {
        return $age >= 1 and $age <= 100;
    }
}

$object = new Employee();
$object->setAge(100);
print_r($object->getAge());
echo "<br>";
$object->setSalary(5454545);
print_r($object->getSalary());