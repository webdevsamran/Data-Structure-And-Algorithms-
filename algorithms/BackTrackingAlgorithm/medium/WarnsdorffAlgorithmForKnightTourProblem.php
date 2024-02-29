<?php

define('N',8);
$cx = [1,1,2,2,-1,-1,-2,-2];
$cy = [2,-2,1,-1,2,-2,1,-1];

function limits($x, $y)
{
    return (($x >= 0 && $y >= 0) && ($x < N && $y < N));
}

function isempty($a, $x, $y)
{
    return (limits($x, $y)) && ($a[$y*N+$x] < 0);
}

function getDegree($a, $x, $y)
{
    global $cx;
    global $cy;
    $count = 0;
    for ($i = 0; $i < N; $i++)
        if (isempty($a, ($x + $cx[$i]), ($y + $cy[$i])))
            $count++;
    return $count;
}

function nextMove(&$a,&$x,&$y)
{
    global $cx;
    global $cy;
    $min_deg_idx = -1;
    $c = NULL;
    $min_deg = (N+1);
    $nx = NULL;
    $ny = NULL;
 
    $start = rand(0,999999)%N;
    for ($count = 0; $count < N; $count++)
    {
        $i = ($start + $count)%N;
        $nx = $x + $cx[$i];
        $ny = $y + $cy[$i];
        if ((isempty($a, $nx, $ny)) && ($c = getDegree($a, $nx, $ny)) < $min_deg)
        {
            $min_deg_idx = $i;
            $min_deg = $c;
        }
    }

    if ($min_deg_idx == -1)
        return false;
 
    $nx = $x + $cx[$min_deg_idx];
    $ny = $y + $cy[$min_deg_idx];

    $a[$ny*N + $nx] = $a[($y)*N + ($x)]+1;

    $x = $nx;
    $y = $ny;
 
    return true;
}

function neighbour($x,$y,$xx,$yy){
    global $cx;
    global $cy;
    for ($i = 0; $i < N; $i++)
        if ((($x+$cx[$i]) == $xx)&&(($y + $cy[$i]) == $yy))
            return true;
 
    return false;
}

function printM($a){
    for ($i = 0; $i < N; $i++)
    {
        for ($j = 0; $j < N; $j++)
            printf("%d\t",$a[$j*N+$i]);
        echo "<br/>";
    }
}

function findClosedTour(){
    $a = array_fill(0,(N*N),-1);
    $sx = rand(0,999999)%N;
    $sy = rand(0,999999)%N;
    $x = $sx;
    $y = $sy;
    $a[$y*N+$x] = 1;

    for ($i = 0; $i < N*N-1; $i++)
        if (nextMove($a, $x, $y) == 0)
            return false;

    if (!neighbour($x, $y, $sx, $sy))
        return false;
 
    printM($a);
    return true;
}

while(!findClosedTour()){
    ;
}
