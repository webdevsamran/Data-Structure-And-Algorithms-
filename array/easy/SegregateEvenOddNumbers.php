<?php

function swap(&$a, &$b): void
{
    $temp = $a;
    $a = $b;
    $b = $temp;
}

function segregation(array &$arr): void
{
    $size = sizeof($arr);
    $i = -1;
    $j = 0;
    while ($j != $size) {
        if ($arr[$j] % 2 == 0) {
            $i++;
            swap($arr[$i], $arr[$j]);
        }
        $j++;
    }
}

$arr = [1, 3, 2, 4, 7, 6, 9, 10];
segregation($arr);
print_r($arr);
