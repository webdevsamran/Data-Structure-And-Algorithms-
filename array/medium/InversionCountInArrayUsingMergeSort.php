<?php

function inversionCount(array $arr): int
{
    $size = sizeof($arr);
    $inv_count = 0;
    for ($i = 0; $i < $size; $i++) {
        for ($j = $i + 1; $j < $size; $j++) {
            if ($arr[$i] > $arr[$j]) {
                $inv_count++;
            }
        }
    }
    return $inv_count;
}

$arr = [8, 6, 4, 2];
echo inversionCount($arr);
