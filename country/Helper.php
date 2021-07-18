<?php

trait Helper
{
    /**
     * @var $name
     * @var $age
     */
    private string $name;
    private int $age;

    /**
     * @param string
     */
    public function setName(string $value) : void
    {
        $this->name = $value;
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @param int
     */
    public function setAge(int $value) : void
    {
        $this->age = $value;
    }

    /**
     * @return int
     */
    public function getAge() : int
    {
        return $this->age;
    }
}