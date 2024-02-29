<?php

function printMatrixInSpiralForm(array $matrix): void
{
    $rowSize = sizeof($matrix);
    $colSize = sizeof($matrix[0]);
    $row = 0;
    $col = 0;
    echo "Matrix in Spiral Form is: <br/>";
    while ($row < $rowSize && $col < $colSize) {
        for ($i = $col; $i < $colSize; $i++) {
            echo $matrix[$row][$i] . " ";
        }
        $row++;
        for ($i = $row; $i < $rowSize; $i++) {
            echo $matrix[$i][$colSize - 1] . " ";
        }
        $colSize--;
        if ($row < $rowSize) {
            for ($i = $colSize - 1; $i >= $col; $i--) {
                echo $matrix[$rowSize - 1][$i] . " ";
            }
        }
        $rowSize--;
        if ($col < $colSize) {
            for ($i = $rowSize - 1; $i >= $row; $i--) {
                echo $matrix[$i][$col] . " ";
            }
        }
        $col++;
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
printMatrixInSpiralForm($matrix, 3);
