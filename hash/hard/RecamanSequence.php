<?php

function recaman($n){
    $arr = array();
    $arr[0] = 0;
    printf("%d, ", $arr[0]);
    for($i = 1; $i < $n; $i++){
        $curr = $arr[$i-1] - $i;
        for($j = 0;$j < $i; $j++){
            if($arr[$j] == $curr || $curr < 0){
                $curr = $arr[$i - 1] + $i;
                break;
            }
        }
        $arr[$i] = $curr;
        printf("%d, ", $arr[$i]);
    }
}

$n = 17;
recaman($n);