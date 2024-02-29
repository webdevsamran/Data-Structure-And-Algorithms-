<?php

function fibonacci($n, &$dp)
{
    if ($dp[$n] == -1) {
        if ($n <= 1) {
            $dp[$n] = $n;
        } else {
            $dp[$n] = fibonacci($n - 1, $dp) + fibonacci($n - 2, $dp);
        }
    }
    return $dp[$n];
}

echo "<pre>";
$n = 100;
$dp = array_fill(0, $n + 1, -1);
fibonacci($n, $dp);
print_r($dp);
