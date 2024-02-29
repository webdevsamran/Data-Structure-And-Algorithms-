<?php

function findUnique(array $matrix): void
{
    $row = sizeof($matrix);
    $col = sizeof($matrix[0]);
    $count = array();
    for ($i = 0; $i < $row; $i++) {
        for ($j = 0; $j < $col; $j++) {
            $count[$matrix[$i][$j]]++;
        }
    }
    echo "Unique Elements in Matrix are: <br/>";
    foreach ($count as $key => $val) {
        if ($val == 1) {
            echo $key . " ";
        }
    }
    echo "<br/>";
}

$matrix = [
    [0, 6, 8, 9, 8, 6],
    [20, 22, 28, 29, 22, 20],
    [36, 38, 50, 61, 50, 36],
    [64, 66, 100, 122, 66, 122]
];

findUnique($matrix);
