<?php


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

$test = new Test();
/*print_r($test->getSum().'<br/>');*/
echo $test->getSum();