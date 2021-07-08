<?php

include 'traits/Trait1.php';
include 'traits/Trait2.php';
include 'traits/Trait3.php';
class Test
{
    use Trait1, Trait2, Trait3;

    public function getSum()
    {
        $a = $this->method1();
        $b = $this->method2();
        $c = $this->method3();

        return $a + $b + $c;
    }
}
