<?php

namespace Country;

include 'Helper.php';

use Helper;

class Country
{
    use Helper;

    /**
     * @var $population
     */
    private int $population;

    /**
     * @param int
     */
    public function setPopulation(int $value) : void
    {
        $this->population = $value;
    }

    /**
     * @return int
     */
    public function getPopulation() : int
    {
        return $this->population;
    }
}