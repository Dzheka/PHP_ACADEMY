<?php

namespace Test;

use Trait1\Trait1;
use Trait2\Trait2;
use Trait3\Trait3;

require_once "config.php";

class Test
{
    use Trait1;
    use Trait2;
    use Trait3;

    /**
     * @return int
     */
    public static function sum() : int
    {
        $sum = Trait1::method1() + Trait2::method2() + Trait3::method3();
        return $sum;
    }
}