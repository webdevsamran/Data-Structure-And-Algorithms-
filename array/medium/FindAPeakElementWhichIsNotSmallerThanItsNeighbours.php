<?php

function peakElement(array &$arr): void
{
    $size = sizeof($arr);
    for ($i = 1; $i < $size - 1; $i++) {
        if ($arr[$i] >= $arr[$i - 1] && $arr[$i] >= $arr[$i + 1]) {
            echo $arr[$i] . " ";
        }
    }
}

$arr = [10, 20, 15, 2, 23, 90, 67];
peakElement($arr);
