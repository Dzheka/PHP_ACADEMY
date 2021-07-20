<?php

class Employee{
   private $name;
   private $age;
   private $salary;

   public function setName($name) {
       $this->name=$name;
   }
    public function getName(){
       return $this->name;
    }
    public function setAge($age) {
        if ($this->isAgeCorrect($age)){
            $this->age=$age;
        }
    }
    public function getAge(){
       return $this->age;
    }
    private function isAgeCorrect($age){
       if ($age >= 1 and $age<=100){
           return true;
       }
    return false;
   }
    public function setSalary($salary){
        $this->salary=$salary;
    }
    public function getSalary(){
       return $this->salary . '$';
    }

}
$employee = new Employee();

$employee->setName('Fara');
$employee->setAge(88);
$employee->setSalary(400);


print_r($employee->getName() . '<br/>');
print_r($employee->getAge() . '<br/>');
print_r($employee->getSalary() . '<br/>');