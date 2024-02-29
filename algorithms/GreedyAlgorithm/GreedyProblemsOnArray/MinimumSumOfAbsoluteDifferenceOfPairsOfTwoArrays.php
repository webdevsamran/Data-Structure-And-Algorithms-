<?php

function findMinSum($a, $b, $n)
{
    sort($a);
    sort($b);

    $min_sum = 0;

    for ($i = 0; $i < $n; $i++) {
        $min_sum += abs($a[$i] - $b[$i]);
    }

    return $min_sum;
}

$a = [4, 1, 8, 7];
$b = [2, 3, 6, 5];
$n = sizeof($a);
echo findMinSum($a, $b, $n);
