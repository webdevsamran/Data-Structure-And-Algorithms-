<?php

function shiftElementByK(array &$matrix, int $shift_number): void
{
    $row = sizeof($matrix);
    $col = sizeof($matrix[0]);
    $temp = array();
    for ($i = 0; $i < $row; $i++) {
        $j = 0;
        for ($k = $shift_number; $k < $col; $k++) {
            $temp[$i][$j] = $matrix[$i][$k];
            $j++;
        }
        for ($k = 0; $k < $shift_number; $k++) {
            $temp[$i][$j] = $matrix[$i][$k];
            $j++;
        }
    }
    $matrix = $temp;
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
shiftElementByK($matrix, 1);
shiftElementByK($matrix, 2);
shiftElementByK($matrix, 3);
