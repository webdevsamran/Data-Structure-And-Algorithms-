<?php

function swap(&$a, &$b)
{
    $temp = $a;
    $a = $b;
    $b = $temp;
}

function transpose(array &$matrix): void
{
    $row = sizeof($matrix);
    $col = sizeof($matrix[0]);
    for ($i = 0; $i < $row; $i++) {
        for ($j = $i; $j < $col; $j++) {
            swap($matrix[$i][$j], $matrix[$j][$i]);
        }
    }
}

function printMatrix(array $matrix): void
{
    echo "Matrix: <br/>";
    $row = sizeof($matrix);
    $col = sizeof($matrix[0]);
    for ($i = 0; $i < $row; $i++) {
        for ($j = 0; $j < $col; $j++) {
            echo $matrix[$i][$j] . " ";
        }
        echo "<br/>";
    }
    echo "<br/>";
}

$matrix = [
    [0, 6, 8, 9],
    [20, 22, 28, 29],
    [36, 38, 50, 61],
    [64, 66, 100, 122]
];

printMatrix($matrix);
transpose($matrix);
printMatrix($matrix);
