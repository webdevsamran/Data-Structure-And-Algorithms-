<?php

function columnWiseTraversal(array $matrix): void
{
    $row = sizeof($matrix);
    $col = sizeof($matrix[0]);
    for ($i = 0; $i < $col; $i++) {
        for ($j = 0; $j < $row; $j++) {
            echo $matrix[$j][$i] . " ";
        }
    }
}

$matrix = [
    [0, 6, 8, 9, 8, 6],
    [20, 22, 28, 29, 22, 20],
    [36, 38, 50, 61, 50, 36],
    [64, 66, 100, 122, 66, 122]
];

columnWiseTraversal($matrix);
