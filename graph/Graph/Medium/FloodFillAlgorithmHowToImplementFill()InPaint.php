<?php

define('SIZE',8);

function floodFillUtil(&$screen,$x,$y,$prevC,$newC){
    if($x < 0 || $y < 0 || $x >= SIZE || $y >= SIZE){
        return;
    }
    if($screen[$x][$y] != $prevC){
        return;
    }
    if($screen[$x][$y] == $newC){
        return;
    }
    $screen[$x][$y] = $newC;
    floodFillUtil($screen, $x+1, $y, $prevC, $newC);
    floodFillUtil($screen, $x-1, $y, $prevC, $newC);
    floodFillUtil($screen, $x, $y+1, $prevC, $newC);
    floodFillUtil($screen, $x, $y-1, $prevC, $newC);
}

function floodFill(&$screen, $x, $y, $newC){
    $prevC = $screen[$x][$y];
    if($newC == $prevC){
        return;
    }
    floodFillUtil($screen,$x,$y,$prevC,$newC);
}

$screen = [
    [1, 1, 1, 1, 1, 1, 1, 1],
    [1, 1, 1, 1, 1, 1, 0, 0],
    [1, 0, 0, 1, 1, 0, 1, 1],
    [1, 2, 2, 2, 2, 0, 1, 0],
    [1, 1, 1, 2, 2, 0, 1, 0],
    [1, 1, 1, 2, 2, 2, 2, 0],
    [1, 1, 1, 1, 1, 2, 1, 1],
    [1, 1, 1, 1, 1, 2, 2, 1],
];
$x = 4;
$y = 4;
$newC = 3;
floodFill($screen, $x, $y, $newC);
echo "Updated screen after call to floodFill: <br/>";
for ($i = 0; $i < SIZE; $i++)
{
    for ($j = 0; $j < SIZE; $j++)
        echo $screen[$i][$j] . " ";
    echo "<br/>";
}