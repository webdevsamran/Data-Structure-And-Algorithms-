<?php

function floodFill(&$screen, $sr, $sc, $row, $col, $source, $color)
{
    if ($sr < 0 || $sr >= $row || $sc < 0 || $sc >= $col)
        return;
 
    if ($screen[$sr][$sc] != $source)
        return;
   
    $screen[$sr][$sc] = $color;
    floodFill($screen, $sr - 1, $sc, $row, $col, $source, $color);
    floodFill($screen, $sr + 1, $sc, $row, $col, $source, $color);
    floodFill($screen, $sr, $sc + 1, $row, $col, $source, $color);
    floodFill($screen, $sr, $sc - 1, $row, $col, $source, $color);
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

for($i = 0; $i < $m; $i++) {
    for($j = 0; $j < $n; $j++) {
        echo $screen[$i][$j] . " ";
    }
    echo "<br/>";
}