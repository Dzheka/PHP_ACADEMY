<?php
include 'Helper.php';


class Country
{
    use Helper;

    public function __construct($name, $age, $population)
    {
        $this->name = $name;
        $this->age = $age;
        $this->population = $population;
    }
}

$country = new Country('America', 1000, 10000001);
echo "Name: " . $country->getName() . "<br/>";
echo "Age: " . $country->getAge() . "<br/>";
echo "Country: " . $country->getPopulation(). "<br/>";