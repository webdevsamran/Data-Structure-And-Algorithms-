<?php


function fibonacci($n): array
{
    if ($n <= 1) {
        return $n;
    } else {
        $dp = array();
        $dp[0] = 0;
        $dp[1] = 1;
        for ($i = 2; $i <= $n; $i++) {
            $dp[$i] = $dp[$i - 1] + $dp[$i - 2];
        }
        return $dp;
    }
}

echo "<pre>";
print_r(fibonacci(100));
