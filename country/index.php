<?php

require_once "Country.php";
require_once "Helper.php";

use Country\Country;

$country1 = new Country();
$country1->setName('Moscow');
$country1->setAge(1700);
$country1->setPopulation(14000000);

echo $country1->getName() . '<br/>';
echo $country1->getAge() . '<br/>';
echo $country1->getPopulation() . '<br/>';