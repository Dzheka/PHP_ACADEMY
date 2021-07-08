<?php

include 'Helper.php';

class User {

    use Helper;

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

}

class City {

    use Helper;

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }
}

//$user = new User('Ibra', 30);
//echo $user->getName();
//echo $user->getAge();


$city = new City('Dushanbe', 2000);
echo $city->getName();
echo $city->getAge();