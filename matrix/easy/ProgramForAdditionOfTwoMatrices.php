<?php

function addTwoMatrices(array &$matrix1, array &$matrix2): void
{
    $size1 = sizeof($matrix1);
    $size2 = sizeof($matrix2);
    $res_matrix = array();
    for ($i = 0; $i < $size1; $i++) {
        for ($j = 0; $j < $size2; $j++) {
            $res_matrix[$i][$j] = $matrix1[$i][$j] + $matrix2[$i][$j];
        }
    }
    printMatrix($res_matrix);
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

$matrixA = [
    [1, 2, 3, 4],
    [5, 6, 7, 8],
    [9, 10, 11, 12],
    [13, 14, 15, 16]
];
$matrixB = [
    [16, 15, 14, 13],
    [12, 11, 10, 9],
    [8, 7, 6, 5],
    [4, 3, 2, 1]
];

printMatrix($matrixA);
printMatrix($matrixB);
addTwoMatrices($matrixA, $matrixB);
