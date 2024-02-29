<?php

function stockBuySell($arr, $n){
    $min_ind = 0;
    $ans = array();
    for($i = 0; $i < $n-1; $i++){
        if($arr[$i] > $arr[$i+1]){
            if($min_ind != $i){
                $temp = array();
                array_push($temp,$min_ind);
                array_push($temp,$i);
                array_push($ans,$temp);
            }
            $min_ind = $i + 1;
        }
    }
    if($min_ind < $n - 1){
        $temp = array();
        array_push($temp, $min_ind);
        array_push($temp, $n - 1);
        array_push($ans, $temp);
    }
    return $ans;
}

$N = 7;
$A = [100,180,260,310,40,535,695];
echo "<pre>";
print_r(stockBuySell($A,$N));