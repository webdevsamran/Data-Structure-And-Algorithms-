<?php

function countQuadRuples($arr1, $arr2, $arr3, $arr4, $x)
{
    $temp = array();
    $size = sizeof($arr1);
    for ($i = 0; $i < $size; $i++) {
        for ($j = 0; $j < $size; $j++) {
            $key = $arr1[$i] + $arr2[$j];
            if (!array_key_exists($key, $temp)) {
                $temp[$key] = 0;
            }
            $temp[$key]++;
        }
    }
    $totalQuadruples = 0;
    for ($i = 0; $i < $size; $i++) {
        for ($j = 0; $j < $size; $j++) {
            $key = $x - ($arr3[$i] + $arr4[$j]);
            if (array_key_exists($key, $temp)) {
                $totalQuadruples += $temp[$key];
            }
        }
    }
    echo "Total Quadruples are: " . $totalQuadruples;
}

$arr1 = [1, 4, 5, 6];
$arr2 = [2, 3, 7, 8];
$arr3 = [1, 4, 6, 10];
$arr4 = [2, 4, 7, 8];
countQuadRuples($arr1, $arr2, $arr3, $arr4, 30);
