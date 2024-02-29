<?php

function rotateBy180(array &$matrix): void
{
    $row = sizeof($matrix);
    $col = sizeof($matrix[0]);
    $temp = array();
    for ($i = $row - 1; $i >= 0; $i--) {
        for ($j = $col - 1; $j >= 0; $j--) {
            array_push($temp, $matrix[$i][$j]);
        }
    }
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
rotateBy180($matrix);
printMatrix($matrix);
