<?php

function uniqueInMatrix(array $matrix): void
{
    $row = sizeof($matrix);
    $col = sizeof($matrix[0]);
    $count = array();
    for ($i = 0; $i < $row; $i++) {
        for ($j = 0; $j < $col; $j++) {
            if (!array_key_exists($matrix[$i][$j], $count)) {
                $count[$matrix[$i][$j]] = 0;
            }
            $count[$matrix[$i][$j]]++;
        }
    }
    echo "Unique Elements Are: ";
    foreach ($count as $key => $val) {
        if ($val == 1) {
            echo $key . " ";
        }
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
    [1, 2, 3, 20],
    [5, 6, 20, 25],
    [1, 3, 5, 6],
    [6, 7, 8, 15]
];

printMatrix($matrix);
uniqueInMatrix($matrix);
