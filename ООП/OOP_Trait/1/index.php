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
echo $country->getName();
echo "<br>";
echo $country->getAge();
echo "<br>";
echo $country->getPopulation();