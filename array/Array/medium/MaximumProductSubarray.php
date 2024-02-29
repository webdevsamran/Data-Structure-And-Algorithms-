<?php

function maxSubarrayProduct($arr,$n){
    $max_ending_here = $arr[0];
    $min_ending_here = $arr[0];
    $max_so_far = $arr[0];
    for($i = 1; $i < $n; $i++){
        $temp = max([$arr[$i], $arr[$i] * $max_ending_here, $arr[$i] * $min_ending_here ]);
        $min_ending_here = min([$arr[$i], $arr[$i] * $max_ending_here, $arr[$i] * $min_ending_here ]);
        $max_ending_here = $temp;
        $max_so_far = max($max_so_far,$max_ending_here);
    }
    return $max_so_far;
}

$arr = [ 1, -2, -3, 0, 7, -8, -2 ];
$n = sizeof($arr);
echo "Maximum Sub array product is " . maxSubarrayProduct($arr, $n);