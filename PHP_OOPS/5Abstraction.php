<?php

/* abstract class ABC{
    abstract protected function xyz();
}

class child extends ABC{
    function xyz()
    {
        echo "Hello World";
    }
}

$obj = new child;
$obj->xyz(); */

abstract class employee{
    protected $name;
    protected $annualSalary;
    protected $hourlySalary;
    abstract function getName();
    abstract function monthlySalary();
    abstract function hourlySalary($workingHours);
}

class child extends employee{

    function __construct($name, $annualSalary, $hourlySalary)
    {
        $this->name = $name;
        $this->annualSalary = $annualSalary;
        $this->hourlySalary = $hourlySalary;
    }

    function getName()
    {
        echo $this->name;
    }

    function monthlySalary()
    {
        echo (int)($this->annualSalary / 12);
    }

    function hourlySalary($whr)
    {
        echo $this->hourlySalary * $whr;
    }
}

$obj = new child("Samran", 1000, 10);
$obj->getName();
$obj->monthlySalary();
$obj->hourlySalary(10);