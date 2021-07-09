<?php

class Employee
{
    private string $name;
    private int $age;
    private float $salary;

    public function __construct(string $name, int $age, float $salary)
    {
        $this->name = $name;
        if ($this->isAgeCorrect($age)) {
            $this->age = $age;
        }
        $this->salary = $salary;
    }


    //getters
    public function getName() :string
    {
        return $this->name;
    }
    public function getAge()
    {
        return $this->age;
    }
    public function getSalary()
    {
        return "{$this->salary}$";
    }


    //setters
    public function setName(string $name) 
    {
        $this->name = $name;
    }

    public function setAge(int $age)
    {
        if ($this->isAgeCorrect($age)) {
            $this->age = $age;
        } else {
            echo "An Error occur";
        }
    }

    public function setSalary(int $salary) 
    {
        $this->salary = $salary;
    }


    //validation
    private function isAgeCorrect($age) :bool
    {
        return $age > 0 && $age <= 100;
    }
}
