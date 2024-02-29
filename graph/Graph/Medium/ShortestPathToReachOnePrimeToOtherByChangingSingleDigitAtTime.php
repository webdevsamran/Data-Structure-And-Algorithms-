<?php

class Graph{
    public $v;
    public $list;

    function __construct($v)
    {
        $this->v = $v;
        $this->list = array();
    }

    function addEdge($v1,$v2){
        $this->list[$v1][] = $v2;
        $this->list[$v2][] = $v1;
    }
}

function shortestPath($num1,$num2){
    $pset = array();
    SieveOfEratosthenes($pset);
}

$num1 = 1033;
$num2 = 8179;
echo shortestPath($num1, $num2);