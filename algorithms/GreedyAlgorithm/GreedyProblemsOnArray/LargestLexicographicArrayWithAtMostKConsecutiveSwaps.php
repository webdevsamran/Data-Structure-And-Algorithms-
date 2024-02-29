<?php

function swap(&$a, &$b): void
{
    $temp = $a;
    $a = $b;
    $b = $temp;
}

function KSwapMaximum(&$arr, $size, $k): void
{
    for ($i = 0; $i < $size - 1 && $k > 0; $i++) {
        $indexP = $i;
        for ($j = $i + 1; $j < $size; $j++) {
            if ($k <= $j - $i) {
                break;
            }
            if ($arr[$j] > $arr[$indexP]) {
                $indexP = $j;
            }
        }
        for ($j = $indexP; $j > $i; $j--) {
            swap($arr[$j], $arr[$j - 1]);
        }
        $k -= $indexP - $i;
    }
}

$arr = [3, 5, 4, 1, 2];
$n = sizeof($arr);
$k = 3;
KSwapMaximum($arr, $n, $k);
for ($i = 0; $i < $n; ++$i)
    echo $arr[$i] . " ";
