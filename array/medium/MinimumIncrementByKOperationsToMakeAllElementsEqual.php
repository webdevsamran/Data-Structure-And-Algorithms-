<?php

function minOps(array $arr, int $key): void
{
    $max = max($arr);
    $size = sizeof($arr);
    $res = 0;
    for ($i = 0; $i < $size; $i++) {
        if (($max - $arr[$i]) % $key != 0) {
            echo "Not Divisible";
            return;
        }
        $res += (int)(($max - $arr[$i]) / $key);
    }
    echo $res;
}

$arr = [21, 33, 9, 45, 63];
$key = 6;
minOps($arr, $key);
