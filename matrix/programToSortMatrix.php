<?php

function sortMatrix(array &$matrix): void
{
    $row = sizeof($matrix);
    $col = sizeof($matrix[0]);
    $temp = array();
    for ($i = 0; $i < $row; $i++) {
        for ($j = 0; $j < $col; $j++) {
            array_push($temp, $matrix[$i][$j]);
        }
    }
    sort($temp, SORT_ASC);
    $k = 0;
    for ($i = 0; $i < $row; $i++) {
        for ($j = 0; $j < $col; $j++) {
            $matrix[$i][$j] = $temp[$k];
            $k++;
        }
    }
}

function printMatrix(array $matrix): void
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
    [64, 66, 100, 122],
    [36, 38, 50, 61],
    [20, 22, 28, 29],
    [0, 6, 8, 9]
];

printMatrix($matrix);
sortMatrix($matrix);
printMatrix($matrix);
