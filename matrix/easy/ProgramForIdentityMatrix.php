<?php

function checkScalarMatrix(array &$matrix): void
{
    $row = sizeof($matrix);
    $col = sizeof($matrix[0]);
    for ($i = 0; $i < $row; $i++) {
        for ($j = 0; $j < $col; $j++) {
            if (($i == $j && ($matrix[$i][$j] != 1)) || ($i != $j && ($matrix[$i][$j] != 0))) {
                echo "Matrix is Not Identity<br/>";
                return;
            }
        }
    }
    echo "Matrix is Identity<br/>";
    return;
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

$matrix1 = [
    [1, 0, 0],
    [0, 1, 0],
    [0, 0, 1]
];
$matrix2 = [
    [1, 0, 0],
    [0, 2, 0],
    [0, 0, 1]
];

printMatrix($matrix1);
checkScalarMatrix($matrix1);
printMatrix($matrix2);
checkScalarMatrix($matrix2);
