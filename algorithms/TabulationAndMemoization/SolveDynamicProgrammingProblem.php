<?php

// Returns the number of arrangements to Form a Number
function solve($n, &$dp)
{
    if ($n < 0) {
        return 0;
    }
    if ($n == 0) {
        return 1;
    }
    if ($dp[$n] != -1) {
        return $dp[$n];
    }
    return $dp[$n] = solve($n - 1, $dp) + solve($n - 3, $dp) + solve($n - 5, $dp);
}

$n = 3;
$dp = array_fill(0, $n + 1, -1);
echo solve($n, $dp);
