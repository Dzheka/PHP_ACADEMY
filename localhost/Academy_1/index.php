<?php
include 'function.php';
//class
Class Car{

    public $color;
    public $mark;
    private $year;
    public $price;

    public function  __construct($color,$mark,$year,$price)
    {
      $this->color=$color;
      $this->mark=$mark;
      $this->year=$year;
      $this->price=$price;
      $this->getCharacteristics();
    }
    public function calculateSpeed()
    {
        $this->speed= round($this->price/$this->year, 1);
    }
    public function getCharacteristics()
    {
       $this->calculateSpeed();
        return $this->color. ' '.$this->mark. ' '.$this->year.' '.$this->price.' '.$this->speed;
    }
}

$mercedes = new Car('blue', 'S-class', 2020, 300000);
print_r ($mercedes);
/*var_dump($mercedes);*/
/*Class Human{
    public $name;
    public $age;


    function getInfo()
    {
        return $this->name.'Возраст'.$this->age;
    }
    public function  __construct($name, $age){
        $this->name=$name;
        $this->age=$age;
    }
}

//object
$human1 = new Human('Fara', 33);
$human2 = new Human('Zara', 12);
$human3 = new Human('Dary', 23);
echo $human1->getInfo();
echo $human2->getInfo();
echo $human3->getInfo();*/

/*echo $human1 -> name;
$human2 = new Human();
echo $human2 -> age;*/

/*var_dump($human1 instanceof Human);
var_dump($human2 instanceof gggg);*/

