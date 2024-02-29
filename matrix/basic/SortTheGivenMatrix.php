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
sortMatrix($matrix);
printMatrix($matrix);
