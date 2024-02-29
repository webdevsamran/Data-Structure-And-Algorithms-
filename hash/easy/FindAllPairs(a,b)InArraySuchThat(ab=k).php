<?php

function findPairs($arr, $k)
{
    $size = sizeof($arr);
    for ($i = 0; $i < $size; $i++) {
        for ($j = 0; $j < $size; $j++) {
            if ($i != $j && ($arr[$i] % $arr[$j] == $k)) {
                echo "(" . $arr[$i] . "," . $arr[$j] . ") ";
            }
        }
    }
}

$arr = [2, 3, 5, 4, 7];
findPairs($arr, 3);
