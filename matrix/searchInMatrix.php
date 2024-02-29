<?php

function matrixSearch(array $matrix, int $number): void
{
    $row = sizeof($matrix);
    $col = sizeof($matrix[0]);
    for ($i = 0; $i < $row; $i++) {
        for ($j = 0; $j < $col; $j++) {
            if ($matrix[$i][$j] == $number) {
                echo "The Number: " . $number . " is Present";
                return;
            }
        }
    }
    echo "The Number: " . $number . " is not Present";
    return;
}

$matrix = [
    [0, 6, 8, 9, 8, 6],
    [20, 22, 28, 29, 22, 20],
    [36, 38, 50, 61, 50, 36],
    [64, 66, 100, 122, 66, 122]
];
matrixSearch($matrix, 100);
