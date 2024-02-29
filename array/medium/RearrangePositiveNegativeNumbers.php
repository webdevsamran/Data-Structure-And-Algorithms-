<?php

function swap(&$a, &$b): void
{
    $temp = $a;
    $a = $b;
    $b = $temp;
}

function rearrange(array &$arr): void
{
    $size = sizeof($arr);
    $i = -1;
    for ($j = 0; $j < $size; $j++) {
        if ($arr[$j] < 0) {
            $i++;
            swap($arr[$i], $arr[$j]);
        }
    }
    print_r($arr);
    $pos = $i + 1;
    $neg = 0;
    while ($pos < $size && $neg < $pos && $arr[$neg] < 0) {
        swap($arr[$neg], $arr[$pos]);
        $pos++;
        $neg += 2;
    }
}

$arr = [-1, 2, -3, 4, 5, 6, -7, 8, 9];
rearrange($arr);
echo "<br/>";
print_r($arr);
