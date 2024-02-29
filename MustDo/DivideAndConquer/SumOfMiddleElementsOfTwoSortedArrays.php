<?php

function findMidSum($arr1, $arr2, $n){
    if($n == 1){
        return $arr1[0] + $arr2[0];
    }
    if($n == 2){
        return max($arr1[0],$arr2[0]) + min($arr1[1],$arr2[1]);
    }
    $low = 0;
    $high = $n - 1;
    $ans = -1;
    while($low <= $high){
        $cut1 = $low + (int)(($high - $low) / 2);
        $cut2 = $n - $cut1;
        $l1 = ($cut1 == 0) ? PHP_INT_MIN : $arr1[$cut1 - 1];
        $l2 = ($cut2 == 0) ? PHP_INT_MIN : $arr2[$cut2 - 1];
        $r1 = ($cut1 == $n) ? PHP_INT_MAX : $arr1[$cut1];
        $r2 = ($cut2 == $n) ? PHP_INT_MAX : $arr2[$cut2];

        if($l1 > $r2){
            $high = $cut1 - 1;
        }else if($l2 > $r1){
            $low = $cut1 + 1;
        }else{
            $ans = max($l1, $l2) + min($r1, $r2);
            break;
        }
    }
    return $ans;
}

$ar1 = [ 1, 2, 4, 6, 10 ];
$ar2 = [ 4, 5, 6, 9, 12 ];
$n = sizeof($ar1);
echo findMidSum($ar1, $ar2, $n);