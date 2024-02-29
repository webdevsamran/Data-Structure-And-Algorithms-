<?php

function findMin($arr,$n){
    $sum = 0;
    for($i = 0; $i < $n; $i++){
        $sum += $arr[$i];
    }
    $dp = array();
    for($i = 0; $i <= $n; $i++){
        $dp[$i][0] = true;
    }
    for($i = 1; $i <= $sum; $i++){
        $dp[0][$i] = false;
    }
    for($i = 1; $i <= $n; $i++){
        for($j = 1; $j <= $sum; $j++){
            $dp[$i][$j] = $dp[$i-1][$j];
            if($arr[$i-1] <= $j){
                $dp[$i][$j] |= $dp[$i-1][$j-$arr[$i-1]];
            }
        }
    }
    echo "<pre>";
    print_r($dp);
    $diff = PHP_INT_MAX;
    for($j = (int)($sum/2); $j >= 0; $j--){
        if($dp[$n][$j] = true){
            $diff = $sum - 2 * $j;
            break;
        }
    }
    return $diff;
}

$arr = [ 3, 1, 4, 2, 2, 1 ];
$n = sizeof($arr);
echo "The minimum difference between 2 sets is " . findMin($arr, $n);