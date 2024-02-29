<?php

function distinctElementsInMatrix(array $matrix): void
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
    print_r($count);
    asort($count, SORT_DESC);
    echo "Distinct Elements are: ";
    foreach ($count as $key => $val) {
        if ($val >= $row) {
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
    [12, 1, 14, 3, 16],
    [14, 2, 1, 3, 35],
    [14, 1, 14, 3, 11],
    [14, 25, 3, 2, 1],
    [1, 18, 3, 21, 14]
];

printMatrix($matrix);
distinctElementsInMatrix($matrix);
