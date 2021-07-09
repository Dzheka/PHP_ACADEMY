<?php

trait Helper {
    
    private $name;
    private $age;
    private $population;

    public function getName(){
        return $this->name;
    }
    public function getAge(){
        return $this->age;
    }
    public function getPopulation(){
        return $this->population;
    }
}