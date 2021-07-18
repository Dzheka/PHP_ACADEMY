<?php

namespace Employee;

class Employee
{
    /**
     * @var $name
     * @var $age
     * @var @salary
     */
    private string $name;
    private int $age;
    private int $salary;

    /**
     * @param string
     */
    public function setName(string $value) : void
    {
        $this->name = $value;
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @param string
     */
    public function setAge(int $value) : void
    {
        $this->age = $this->isAgeCorrect($value) ?? $value;
    }

    /**
     * @return string
     */
    public function getAge() : int
    {
        return $this->age;
    }

    /**
     * @param string
     */
    public function setSalary(int $value) : void
    {
        $this->salary = $value;
    }

    /**
     * @return string
     */
    public function getSalary() : string
    {
        return $this->salary . '$';
    }

    private function isAgeCorrect(int $value) : bool
    {
        if ($value >= 1 && $value <= 100)
        {
            return true;
        }

        return false;
    }
}