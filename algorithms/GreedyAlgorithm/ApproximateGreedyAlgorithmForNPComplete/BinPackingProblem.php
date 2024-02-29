<?php

function nextFit($weight, $size, $capacity): int
{
    $res = 0;
    $bin_rem = $capacity;
    for ($i = 0; $i < $size; $i++) {
        if ($weight[$i] > $bin_rem) {
            $res++;
            $bin_rem = $capacity - $weight[$i];
        } else {
            $bin_rem -= $weight[$i];
        }
    }
    return $res;
}

$weight = [2, 5, 4, 7, 1, 3, 8];
$c = 10;
$n = sizeof($weight);
echo "Number of bins required in Next Fit : " . nextFit($weight, $n, $c);
