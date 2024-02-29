<?php

function traverseUsingRecursion(array $matrix, int $horizontalPosition, int $verticalPosition, int $rowSize, int $colSize): void
{
    if ($horizontalPosition == $rowSize - 1 && $verticalPosition == $colSize - 1) {
        echo $matrix[$horizontalPosition][$verticalPosition] . " ";
        return;
    }
    echo $matrix[$horizontalPosition][$verticalPosition] . " ";
    if ($verticalPosition < $colSize - 1) {
        traverseUsingRecursion($matrix, $horizontalPosition, $verticalPosition + 1, $rowSize, $colSize);
    } else if ($horizontalPosition < $rowSize - 1) {
        echo "<br/>";
        traverseUsingRecursion($matrix, $horizontalPosition + 1, 0, $rowSize, $colSize);
    }
}

$matrix = [
    [0, 6, 8, 9],
    [20, 22, 28, 29],
    [36, 38, 50, 61],
    [64, 66, 100, 122]
];
$row_size = sizeof($matrix);
$col_size = sizeof($matrix[0]);

traverseUsingRecursion($matrix, 0, 0, $row_size, $col_size);
