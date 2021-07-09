<?php
include './traits/Trait1.php';
include './traits/Trait2.php';
include './traits/Trait3.php';

class Test
{
    use Trait1, Trait2, Trait3;

    public function getSum()
    {
        return $this->method1() + $this->method2() + $this->method3();
    }
}

$test = new Test();
echo $test->getSum();