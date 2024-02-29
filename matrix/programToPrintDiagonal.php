<?php

function printPrincipalDiagonal(array $matrix): void
{
    echo "Principal Diagonals Are: ";
    $row = sizeof($matrix);
    $col = sizeof($matrix[0]);
    for ($i = 0; $i < $row; $i++) {
        for ($j = 0; $j < $col; $j++) {
            if ($i == $j) {
                echo $matrix[$i][$j] . " ";
            }
        }
    }
    echo "<br/>";
}

function printSecondaryDiagonal(array $matrix): void
{
    echo "Secondary Diagonals Are: ";
    $row = sizeof($matrix);
    $col = sizeof($matrix[0]);
    for ($i = 0; $i < $row; $i++) {
        for ($j = 0; $j < $col; $j++) {
            if ($i + $j == ($row - 1)) {
                echo $matrix[$i][$j] . " ";
            }
        }
    }
    echo "<br/>";
}

$matrix = [
    [0, 6, 8, 9],
    [20, 22, 28, 29],
    [36, 38, 50, 61],
    [64, 66, 100, 122]
];

printPrincipalDiagonal($matrix);
printSecondaryDiagonal($matrix);
