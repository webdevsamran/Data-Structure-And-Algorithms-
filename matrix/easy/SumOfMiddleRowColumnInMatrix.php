<?php

function sumOfMiddleRowColumn(array &$matrix): void
{
    $row = sizeof($matrix);
    $middle_row = (int)($row / 2);
    $middle_row_sum = 0;
    $col = sizeof($matrix[0]);
    $middle_col = (int)($col / 2);
    $middle_col_sum = 0;
    for ($i = 0; $i < $col; $i++) {
        $middle_row_sum += $matrix[$middle_row][$i];
    }
    for ($i = 0; $i < $row; $i++) {
        $middle_col_sum += $matrix[$i][$middle_col];
    }
    echo "Middle Row: " . $middle_row . " & Middle Column: " . $middle_col . "<br/>";
    echo "Middle Row Sum is: " . $middle_row_sum . " <br/>";
    echo "Middle Column Sum is: " . $middle_col_sum . "<br/>";
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
sumOfMiddleRowColumn($matrix);
