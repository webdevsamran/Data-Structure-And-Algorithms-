<?php

function f($idx,$prevIdx,$n,$a,&$dp){
    if($idx == $n){
        return 0;
    }
    if($dp[$idx][$prevIdx+1] != -1){
        return $dp[$idx][$prevIdx+1];
    }
    $notTake = 0 + f($idx+1,$prevIdx,$n,$a,$dp);
    $take = PHP_INT_MIN;
    if($prevIdx == -1 || ($a[$idx] > $a[$prevIdx])){
        $take = 1 + f($idx+1,$idx,$n,$a,$dp);
    }
    return $dp[$idx][$prevIdx+1] = max($take,$notTake);
}

function longestSubsequence($n,$a){
    $dp = array_fill(0,$n+1,array_fill(0,$n+1,-1));
    return f(0, -1, $n, $a, $dp);
}

$a = [ 3, 10, 2, 1, 20 ];
$n = sizeof($a);
echo "Length of lis is " . longestSubsequence($n, $a);