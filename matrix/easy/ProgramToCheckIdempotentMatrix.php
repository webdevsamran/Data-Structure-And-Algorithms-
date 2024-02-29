<?php

function isIdempotent(array &$matrix): void
{
    $size = sizeof($matrix);
    $mul_mat = array();
    for ($i = 0; $i < $size; $i++) {
        for ($j = 0; $j < $size; $j++) {
            $mul_mat[$i][$j] = 0;
            for ($k = 0; $k < $size; $k++) {
                $mul_mat[$i][$j] += $matrix[$i][$k] * $matrix[$k][$j];
            }
        }
    }
    if ($matrix === $mul_mat) {
        echo "Matrix is Idempotent.<br/>";
        return;
    }
    echo "Matrix is not Idempotent.<br/>";
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
    [2, -2, 4],
    [-1, 3, 4],
    [1, -2, -3]
];

printMatrix($matrix);
isIdempotent($matrix);
