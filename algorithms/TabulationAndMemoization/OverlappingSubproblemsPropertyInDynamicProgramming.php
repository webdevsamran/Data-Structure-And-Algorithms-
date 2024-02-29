<?php

// Memoization

function mfib($n, &$memo)
{
    if ($memo[$n] == -1) {
        if ($n <= 1) {
            $memo[$n] = $n;
        } else {
            $memo[$n] = mfib($n - 1, $memo) + mfib($n - 2, $memo);
        }
    }
    return $memo[$n];
}

$n = 20;
$memo = array_fill(0, $n + 1, -1);
mfib($n, $memo);
echo "Memoizaton: <br/><pre>";
print_r($memo);
echo "</pre>";


function tFib($n, &$dp)
{
    if ($n <= 1) {
        $dp[$n] = $n;
    } else {
        $dp[0] = 0;
        $dp[1] = 1;
        for ($i = 2; $i <= $n; $i++) {
            $dp[$i] = $dp[$i - 1] + $dp[$i - 2];
        }
    }
}
$dp = array();
tFib($n, $dp);
echo "Tabulation: <br/><pre>";
print_r($dp);
echo "</pre>";
