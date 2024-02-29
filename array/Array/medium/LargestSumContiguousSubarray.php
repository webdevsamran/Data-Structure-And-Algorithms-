<?php

function maxSubArraySum($arr,$n){
    $max_so_far = PHP_INT_MIN;
    $max_ending_here = 0;
    for($i = 0; $i < $n; $i++){
        $max_ending_here += $arr[$i];
        if($max_so_far < $max_ending_here){
            $max_so_far = $max_ending_here;
        }
        if($max_ending_here < 0){
            $max_ending_here = 0;
        }
    }
    return $max_so_far;
}

$a = [ -2, -3, 4, -1, -2, 1, 5, -3 ];
$n = sizeof($a);
$max_sum = maxSubArraySum($a, $n);
echo "Maximum contiguous sum is " . $max_sum;