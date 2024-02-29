<?php

function isMinHeap($level,$n){
    for($i = (int)($n/2) - 1; $i >= 0; $i--){
        if($level[$i] > $level[2*$i+1]){
            return false;
        }
        if(2*$i+2 < $n){
            if($level[$i] > $level[2*$i+2]){
                return false;
            }
        }
    }
    return true;
}

$level = [10, 15, 14, 25, 30];
$n = sizeof($level);
echo isMinHeap($level, $n) ? "True" : "False";