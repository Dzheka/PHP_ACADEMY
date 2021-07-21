<?php
include 'Helper.php';
class Country{
    use Helper;
    public function __construct($name, $age, $population)
    {
        $this->name = $name;
        $this->age = $age;
        $this->population = $population;
    }
}

$country = new Country('Dushanbe', 89, 141000);

print_r($country->getName().'<br/>');
print_r($country->getAge().'<br/>');
print_r($country->getPopulation().'<br/>');