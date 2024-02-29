<?php

function subArraySum($arr,$n,$k){
    $curr_sum = $arr[0];
    $start = 0;
    for($i = 1; $i < $n; $i++){
        while($curr_sum > $k && $start < $i - 1){
            $curr_sum -= $arr[$start++];
        }
        if($curr_sum == $k){
            echo "Sum Found Between " . $start . " and " . $i-1 . "<br/>";
            return;
        }
        if($i < $n){
            $curr_sum += $arr[$i];
        }
    }
}

$arr = [ 15, 2, 4, 8, 9, 5, 10, 23 ];
$n = sizeof($arr);
$sum = 23;
subArraySum($arr, $n, $sum);