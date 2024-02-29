<?php

function getSum($a,$n){
    $sum = 0;
    for($i = 0; $i < $n; $i++){
        $sum += $a[$i];
    }
    return $sum;
}

function getTarget($a,$n,$b,$m){
    $sum1 = getSum($a,$n);
    $sum2 = getSum($b,$m);
    if(($sum1 - $sum2) % 2 != 0){
        return 0;
    }
    return (int)(($sum1 - $sum2) / 2);
}

function findSwapValues($a,$n,$b,$m){
    sort($a);
    sort($b);
    $target = getTarget($a,$n,$b,$m);
    if($target == 0){
        return;
    }
    $i = $j = 0;
    while($i < $n && $j < $m){
        $diff = $a[$i] - $b[$j];
        if($diff == $target){
            echo $a[$i] . " " . $b[$j];
            return;
        }else if($diff < $target){
            $i++;
        }else{
            $j++;
        }
    }
}

$A = [ 4, 1, 2, 1, 1, 2 ];
$n = sizeof($A);
$B = [ 1, 6, 3, 3 ];
$m = sizeof($B);
findSwapValues($A, $n, $B, $m);