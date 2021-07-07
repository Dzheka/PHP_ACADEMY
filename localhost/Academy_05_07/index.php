<?php
namespace Main; //пространство имен
class Human{
    private $name;
    private $age;

    public function __construct ($name,$age)
    {
        $this->name=$name;
        $this->age=$age;
    }
    public function getInfo()
    {
          echo "Имя {$this->name} и возраст {$this->age}";
    }
}