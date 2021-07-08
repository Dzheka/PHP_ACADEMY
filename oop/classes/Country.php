<?php
include 'traits/Helper.php';
class Country
{
    use Helper;
    private $population;

    public function __construct($name, $age, $population)
    {
        $this->age = $age;
        $this->name = $name;
        $this->population = $population;
    }

    public function getPopulation()
    {
        return $this->population;
    }
}
