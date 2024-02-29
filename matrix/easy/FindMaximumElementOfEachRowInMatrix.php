<?php

function maxEachRowMatrix(array &$matrix): void
{
    $row = sizeof($matrix);
    $col = sizeof($matrix[0]);
    $max_array = array();
    for ($i = 0; $i < $row; $i++) {
        $max = 0;
        for ($j = 0; $j < $row; $j++) {
            if ($matrix[$i][$j] > $max) {
                $max = $matrix[$i][$j];
            }
        }
        array_push($max_array, $max);
    }
    echo "Max Elements in Each ROw are: ";
    foreach ($max_array as $val) {
        echo $val . " ";
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
    [3, 4, 1, 8],
    [1, 4, 9, 11],
    [76, 34, 21, 1],
    [2, 1, 4, 5]
];

printMatrix($matrix);
maxEachRowMatrix($matrix);
