<?php

function searchInMatrix(array &$matrix, int $number): void
{
    $row = sizeof($matrix);
    $col = sizeof($matrix[0]);
    for ($i = 0; $i < $row; $i++) {
        for ($j = 0; $j < $col; $j++) {
            if ($matrix[$i][$j] == $number) {
                echo "Number is Present";
                return;
            }
        }
    }
    echo "Number is Not Present";
    return;
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
searchInMatrix($matrix, 7);
