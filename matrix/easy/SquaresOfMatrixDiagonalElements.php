<?php

function sqaureOfMatrixDiagonals(array &$matrix): void
{
    $row = sizeof($matrix);
    $col = sizeof($matrix[0]);
    echo "Primary Diagonal Squares are: ";
    for ($i = 0; $i < $row; $i++) {
        echo pow($matrix[$i][$i], 2) . " ";
    }
    echo "<br/>";
    echo "Secondary Diagonal Squares are: ";
    for ($i = 0; $i < $row; $i++) {
        echo pow($matrix[$i][$row - $i - 1], 2) . " ";
    }
    echo "<br/>";
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
sqaureOfMatrixDiagonals($matrix);
