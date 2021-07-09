<?php


class Employee
{
    public $name;
    public $age;
    public $salary;

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
       return $this->name;
    }

    public function setAge($age)
    {
        $this->isAgeCorrect($age);
    }

    public function getAge()
    {
       return $this->age;
    }

    public function setSalary($salary)
    {
        $this->salary = $salary;

    }

    public function getSalary()
    {
        return $this->salary."$";
    }

    private function isAgeCorrect($age)
    {
        if (($age > 0) || ($age <= 100))
        {
            $this->age = $age;
        }
        else{
            echo "вы не парвильно заполнили возраст";
        }
    }


}