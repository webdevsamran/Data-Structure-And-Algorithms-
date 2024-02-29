<?php

function rowWiseTraversal(array $matrix): void
{
    $row = sizeof($matrix);
    $col = sizeof($matrix[0]);
    for ($i = 0; $i < $row; $i++) {
        for ($j = 0; $j < $col; $j++) {
            echo $matrix[$i][$j] . " ";
        }
    }
}

$matrix = [
    [0, 6, 8, 9, 8, 6],
    [20, 22, 28, 29, 22, 20],
    [36, 38, 50, 61, 50, 36],
    [64, 66, 100, 122, 66, 122]
];

rowWiseTraversal($matrix);
