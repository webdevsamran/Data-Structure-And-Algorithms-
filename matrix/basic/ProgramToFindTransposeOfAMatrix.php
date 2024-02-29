<?php

function swap(&$a, &$b): void
{
    $temp = $a;
    $a = $b;
    $b = $temp;
}

function transposeMatrix(array &$matrix): void
{
    $row = sizeof($matrix);
    $col = sizeof($matrix[0]);
    for ($i = 0; $i < $row; $i++) {
        for ($j = $i; $j < $col; $j++) {
            swap($matrix[$i][$j], $matrix[$j][$i]);
        }
    }
    printMatrix($matrix);
    return;
}

function printMatrix(array &$matrix): void
{
    $row = sizeof($matrix);
    $col = sizeof($matrix[0]);
    echo "Matrix is: <br/>";
    for ($i = 0; $i < $row; $i++) {
        for ($j = 0; $j < $col; $j++) {
            echo $matrix[$i][$j] . " ";
        }
        echo "<br/>";
    }
    echo "<br/>";
}

$matrix = [
    [5, 4, 7],
    [1, 3, 8],
    [2, 9, 6]
];

printMatrix($matrix);
transposeMatrix($matrix, 7);
