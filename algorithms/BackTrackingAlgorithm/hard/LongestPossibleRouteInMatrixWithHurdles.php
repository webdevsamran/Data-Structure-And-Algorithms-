<?php

define('R',3);
define('C',10);

class Pair{
    public $found;
    public $value;

    function __construct($f = NULL,$v = NULL)
    {
        $this->found = $f;
        $this->value = $v;
    }
}

function findLongestPathUtil($mat,$i,$j,$x,$y,&$visited){
    if($i == $x && $j == $y){
        $p = new Pair(true,0);
        return $p;
    }
    if($i < 0 || $i >= R || $j < 0 || $j >= C || $mat[$i][$j] == 0 || $visited[$i][$j]){
        $p = new Pair(false,PHP_INT_MAX);
        return $p;
    }
    $visited[$i][$j] = true;
    $res = PHP_INT_MIN;
    $sol = findLongestPathUtil($mat, $i, $j - 1, $x, $y, $visited);
    if($sol->found){
        $res = max($res,$sol->value);
    }
    $sol = findLongestPathUtil($mat, $i, $j + 1, $x, $y, $visited);
    if($sol->found){
        $res = max($res,$sol->value);
    }
    $sol = findLongestPathUtil($mat, $i - 1, $j, $x, $y, $visited);
    if($sol->found){
        $res = max($res,$sol->value);
    }
    $sol = findLongestPathUtil($mat, $i + 1, $j, $x, $y, $visited);
    if($sol->found){
        $res = max($res,$sol->value);
    }
    $visited[$i][$j] = false;
    if($res != PHP_INT_MIN){
        $p = new Pair(true,1+$res);
        return $p;
    }else{
        $p = new Pair(false,PHP_INT_MAX);
    }
}

function findLongestPath($mat,$i,$j,$x,$y){
    $visited = array_fill(0,R,array_fill(0,C,0));
    $p = findLongestPathUtil($mat, $i, $j, $x, $y, $visited);
    if ($p->found)
        echo "Length of longest possible route is " . $p->value;
    else
        echo "Destination not reachable from given source";
}

$mat = [ 
    [ 1, 1, 1, 1, 1, 1, 1, 1, 1, 1 ],
    [ 1, 1, 0, 1, 1, 0, 1, 1, 0, 1 ],
    [ 1, 1, 1, 1, 1, 1, 1, 1, 1, 1 ]
];

findLongestPath($mat, 0, 0, 1, 7);