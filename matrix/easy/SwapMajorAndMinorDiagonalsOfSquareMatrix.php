<?php

function swap(&$a, &$b): void
{
    $temp = $a;
    $a = $b;
    $b = $temp;
}

function swapDiagonals(array &$matrix): void
{
    $size = sizeof($matrix);
    for ($i = 0; $i < $size; $i++) {
        swap($matrix[$i][$i], $matrix[$i][($size - $i - 1)]);
    }
    printMatrix($matrix);
}

function printMatrix(array &$matrix): void
{
    echo "Matrix is: <br/>";
    for ($i = 0; $i < sizeof($matrix); $i++) {
        for ($j = 0; $j < sizeof($matrix[0]); $j++) {
            echo $matrix[$i][$j] . " ";
        }
        echo "<br/>";
    }
    echo "<br/>";
}

$matrix = [
    [3, 4, 1, 8],
    [1, 4, 9, 11],
    [76, 34, 21, 1],
    [2, 1, 4, 5]
];

printMatrix($matrix);
swapDiagonals($matrix);
