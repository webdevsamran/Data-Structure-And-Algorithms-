<?php

function rotateMatrix(array &$matrix): void
{
    $rowSize = sizeof($matrix);
    $colSize = sizeof($matrix);
    $row = 0;
    $col = 0;
    $prev = NULL;
    $curr = NULL;
    while ($row < $rowSize && $col < $colSize) {
        $prev = $matrix[$row + 1][$col];
        // Move elements of top row. 
        for ($i = $col; $i < $colSize; $i++) {
            $curr = $matrix[$row][$i];
            $matrix[$row][$i] = $prev;
            $prev = $curr;
        }
        $row++;
        // Move elements of last column.
        for ($i = $row; $i < $rowSize; $i++) {
            $curr = $matrix[$i][$colSize - 1];
            $matrix[$i][$colSize - 1] = $prev;
            $prev = $curr;
        }
        $colSize--;
        // Move elements of bottom row.
        if ($row < $rowSize) {
            for ($i = $colSize - 1; $i >= $col; $i--) {
                $curr = $matrix[$rowSize - 1][$i];
                $matrix[$rowSize - 1][$i] = $prev;
                $prev = $curr;
            }
        }
        $rowSize--;
        // Move elements of first column.
        if ($col < $colSize) {
            for ($i = $rowSize - 1; $i >= $row; $i--) {
                $curr = $matrix[$i][$col];
                $matrix[$i][$col] = $prev;
                $prev = $curr;
            }
        }
        $col++;
    }
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
    [0, 6, 8, 9],
    [20, 22, 28, 29],
    [36, 38, 50, 61],
    [64, 66, 100, 122]
];
echo "Matrix before <br/>";
printMatrix($matrix);
rotateMatrix($matrix);
echo "Matrix After <br/>";
printMatrix($matrix);
