<?php

function swap(&$a,$i,$j){
    $temp = $a[$i];
    $a[$i] = $a[$j];
    $a[$j] = $temp;
}

function indexOf($a,$key){
    $i = NULL;
    for($i = 0; $i < sizeof($a); $i++){
        if($a[$i] == $key){
            return $i;
        }
    }
    return -1;
}

function minSwaps($a, $n){
    $ans = 0;
    $temp = $a;
    sort($temp);
    for($i = 0; $i < $n; $i++){
        if($a[$i] != $temp[$i]){
            $ans++;
            $last = indexOf($a,$temp[$i]);
            swap($a,$i,$last);
        }
    }
    return $ans;
}

$a = [ 101, 758, 315, 730, 472, 619, 460, 479 ];
$n = sizeof($a);
printf("%d", minSwaps($a, $n));