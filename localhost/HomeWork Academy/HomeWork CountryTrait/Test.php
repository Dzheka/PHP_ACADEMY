<?php
include 'Trait1.php';
include 'Trait2.php';
include 'Trait3.php';

class Test
{
    use Trait1;
    use Trait2;
    use Trait3;

    public static function getSum()
    {
        $Sum = Trait1::method1() + Trait2::method2() + Trait3::method3();
        return $Sum;
    }
}

echo Test::getSum();