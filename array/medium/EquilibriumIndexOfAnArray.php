<?php

function equlibriumIndex(array $arr): void
{
    $sum = 0;
    $lastSum = 0;
    $size = sizeof($arr);
    for ($i = 0; $i < $size; $i++) {
        $sum += $arr[$i];
    }
    for ($i = 0; $i < $size; $i++) {
        $sum -= $arr[$i];
        if ($sum == $lastSum) {
            echo "Equilibrium Index is found at Position: " . $i;
            return;
        }
        $lastSum += $arr[$i];
    }
}

$arr = [-7, 1, 5, 2, -4, 3, 0];
equlibriumIndex($arr);
