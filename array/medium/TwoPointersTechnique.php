<?php

function twoPointerTechnique(array &$arr, int $key): void
{
    $size = sizeof($arr);
    $i = 0;
    $j = $size - 1;
    for ($index = 0; $index < $size; $index++) {
        if ($arr[$i] + $arr[$j] == $key) {
            echo "Pairs Found";
            return;
        } else if ($arr[$i] + $arr[$j] > $key) {
            $j--;
        } else if ($arr[$i] + $arr[$j] < $key) {
            $i++;
        }
    }
    echo "Not Found";
    return;
}

$arr = [2, 3, 5, 8, 9, 10, 11];
$key = 7;
twoPointerTechnique($arr, $key);
