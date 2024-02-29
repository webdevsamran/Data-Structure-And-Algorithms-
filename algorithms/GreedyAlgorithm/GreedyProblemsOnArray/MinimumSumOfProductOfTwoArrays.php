<?php

function minproduct($a, $b, $n, $k): int
{
    $res = 0;
    $temp = 0;
    $diff = 0;
    for ($i = 0; $i < $n; $i++) {
        $pro = $a[$i] * $b[$i];
        $res = $res + $pro;

        if ($pro < 0 && $b[$i] < 0) {
            $temp = ($a[$i] + 2 * $k) * $b[$i];
        } else if ($pro < 0 && $a[$i] < 0) {
            $temp = ($a[$i] - 2 * $k) * $b[$i];
        } else if ($pro > 0 && $a[$i] < 0) {
            $temp = ($a[$i] + 2 * $k) * $b[$i];
        } else if ($pro > 0 && $a[$i] > 0) {
            $temp = ($a[$i] - 2 * $k) * $b[$i];
        }

        $d = abs($pro - $temp);
        if ($d > $diff) {
            $diff = $d;
        }
    }
    return $res - $diff;
}

$a = [2, 3, 4, 5, 4];
$b = [3, 4, 2, 3, 2];
$n = 5;
$k = 3;
echo minproduct($a, $b, $n, $k) . "<br/>";
