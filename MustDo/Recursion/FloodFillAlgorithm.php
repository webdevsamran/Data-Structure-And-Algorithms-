<?php

function floodFill(&$screen, $x, $y, $m, $n, $prevC, $newC){
    if($x < 0 || $x >= $m || $y < 0 || $y >= $n){
        return;
    }
    if($screen[$x][$y] != $prevC){
        return;
    }
    $screen[$x][$y] = $newC;
    floodFill($screen, $x - 1, $y, $m, $n, $prevC, $newC);
    floodFill($screen, $x + 1, $y, $m, $n, $prevC, $newC);
    floodFill($screen, $x, $y - 1, $m, $n, $prevC, $newC);
    floodFill($screen, $x, $y + 1, $m, $n, $prevC, $newC);
}

$screen = [ 
    [ 1, 1, 1, 1, 1, 1, 1, 1 ],
    [ 1, 1, 1, 1, 1, 1, 0, 0 ],
    [ 1, 0, 0, 1, 1, 0, 1, 1 ],
    [ 1, 2, 2, 2, 2, 0, 1, 0 ],
    [ 1, 1, 1, 2, 2, 0, 1, 0 ],
    [ 1, 1, 1, 2, 2, 2, 2, 0 ],
    [ 1, 1, 1, 1, 1, 2, 1, 1 ],
    [ 1, 1, 1, 1, 1, 2, 2, 1 ] 
];
$m = 8;
$n = 8;
$x = 4;
$y = 4;
$prevC = $screen[$x][$y];
$newC = 3;
floodFill($screen, $x, $y, $m, $n, $prevC, $newC);
for ($i = 0; $i < $m; $i++) {
    for ($j = 0; $j < $n; $j++) {
        echo $screen[$i][$j] . " ";
    }
    echo "<br/>";
}