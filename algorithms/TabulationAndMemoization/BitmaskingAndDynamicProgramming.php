<?php

define('MOD', 1000000007);

function countWaysUtil($mask, $i, $all_mask, &$dp, $caps, $size)
{
    if ($mask  == $all_mask) {
        return 1;
    }
    if ($i >= $size) {
        return 0;
    }
    if ($dp[$mask][$i] != -1) {
        return $dp[$mask][$i];
    }
    $ways = countWaysUtil($mask, $i + 1, $all_mask, $dp, $caps, $size);
    $size = sizeof($caps[$i]);
    for ($j = 0; $j < $size; $j++) {
        if ($mask  & (1 << $caps[$i][$j])) {
            continue;
        } else {
            $ways += countWaysUtil($mask  | (1 << $caps[$i][$j]), $i + 1, $all_mask, $dp, $caps, $size);
        }
        $ways %= MOD;
    }
    return $dp[$mask][$i] = $ways;
}

function countWays($n, $caps)
{
    $all_mask = (1 << $n) - 1;
    $dp = array_fill(0, $n * $n, array_fill(0, $n, -1));
    echo countWaysUtil(0, 1, $all_mask, $dp, $caps, $n);
    echo "<pre>";
    print_r($dp);
}

$n = 3;
$caps = [[5, 100, 1], [2], [5, 100]];
countWays($n, $caps);
