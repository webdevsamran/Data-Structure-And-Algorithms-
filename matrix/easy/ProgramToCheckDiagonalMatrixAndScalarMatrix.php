<?php

function checkScalarMatrix(array &$matrix): void
{
    $row = sizeof($matrix);
    $col = sizeof($matrix[0]);
    $first = $matrix[0][0];
    for ($i = 0; $i < $row; $i++) {
        for ($j = 0; $j < $col; $j++) {
            if (($i == $j && ($matrix[$i][$j] != $first)) || ($i != $j && ($matrix[$i][$j] != 0))) {
                echo "Matrix is Not Scalar<br/>";
                return;
            }
        }
    }
    echo "Matrix is Scalar<br/>";
    return;
}

function checkDiagonalMatrix(array &$matrix): void
{
    $row = sizeof($matrix);
    $col = sizeof($matrix[0]);
    for ($i = 0; $i < $row; $i++) {
        for ($j = 0; $j < $col; $j++) {
            if ($i != $j && ($matrix[$i][$j] != 0)) {
                echo "Matrix is Not Diagonal<br/>";
                return;
            }
        }
    }
    echo "Matrix is Diagonal<br/>";
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

$matrix = [
    [2, 0, 0],
    [0, 2, 0],
    [0, 0, 2]
];

printMatrix($matrix);
checkDiagonalMatrix($matrix);
checkScalarMatrix($matrix);
