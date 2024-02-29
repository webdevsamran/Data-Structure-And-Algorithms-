<?php

function numberOfBST($n){
    $dp = array_fill(0,$n+1,0);
    $dp[0] = 1;
    $dp[1] = 1;
    for($i = 2; $i <= $n; $i++){
        for($j = 1; $j <= $i ; $j++){
            $dp[$i] = $dp[$i] + ($dp[$i - $j] * $dp[$j - 1]);
        }
    }
    return $dp[$n];
}

$N = 3;
echo "Number of structurally Unique BST with " . $N . " keys are : " . numberOfBST($N);