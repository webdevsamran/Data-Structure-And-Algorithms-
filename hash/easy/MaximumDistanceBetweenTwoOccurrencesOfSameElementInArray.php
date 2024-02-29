<?php

function maxDistance($arr): int
{
    $temp = array();
    $max_distance = 0;
    for ($i = 0; $i < sizeof($arr); $i++) {
        if (array_key_exists($arr[$i], $temp)) {
            $max_distance = max($max_distance, $i - $temp[$arr[$i]]);
        } else {
            $temp[$arr[$i]] = $i;
        }
    }
    return $max_distance;
}

$arr = [3, 2, 1, 2, 1, 4, 5, 8, 6, 7, 4, 2];
echo maxDistance($arr);
