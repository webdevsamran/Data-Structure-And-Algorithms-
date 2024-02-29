<?php

function getIndex($arr, $n, $ele){
    $low = 0;
    $high = $n - 1;
    $ans = -1;
    while($low <= $high){
        $mid = (int)(($low + $high) / 2);
        if($arr[$mid] > $ele){
            $ans = $mid;
            $high = $mid - 1;
        }else{
            $low = $mid + 1;
        }
    }
    return $ans;
}

function countPairs($X,$Y,$m,$n){
    sort($X);
    sort($Y);
    $zero = $one = $two = $three = $four = 0;
    for($i = 0; $i < $n; $i++){
        if($Y[$i] == 0){
            $zero++;
        }else if($Y[$i] == 1){
            $one++;
        }else if($Y[$i] == 2){
            $two++;
        }else if($Y[$i] == 3){
            $three++;
        }else if($Y[$i] == 4){
            $four++;
        }
    }
    $ans = 0;
    for($i = 0; $i < $m; $i++){
        if($X[$i] == 0){
            continue;
        }else if($X[$i] == 1){
            $ans += $zero;
        }else if($X[$i] == 2){
            $index = getIndex($Y , $n , 2);
            if($index != -1){
                $ans += $n - $index;
            }
            $ans -= $three;
            $ans -= $four;
            $ans += $zero + $one;
        }else{
            $index = getIndex($Y, $n, $X[$i]);
            if($index != -1){
                $ans += $n - $index;
            }
            $ans += $zero + $one;
            if($X[$i] == 3){
                $ans += $two;
            }
        }
    }
    return $ans;
}

$M = 3;
$X = [2, 1, 6];
$N = 2;
$Y = [1, 5];

echo countPairs($X,$Y,$M,$N);