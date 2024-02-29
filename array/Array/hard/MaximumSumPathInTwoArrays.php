<?php

function maxPathSum($ar1,$ar2,$m,$n){
    $i = $j = $result = $sum1 = $sum2 = 0;
    while($i < $m && $j < $n){
        if($ar1[$i] < $ar2[$j]){
            $sum1 += $ar1[$i++];
        }else if($ar1[$i] > $ar2[$j]){
            $sum2 += $ar2[$j++];
        }else{
            $result += max($sum1,$sum2) + $ar1[$i];
            $sum1 = 0;
            $sum2 = 0;
            $i++;
            $j++;
        }
    }
    while($i < $m){
        $sum1 += $ar1[$i++];
    }
    while($j < $n){
        $sum2 += $ar2[$j++];
    }
    $result += max($sum1,$sum2);
    return $result;
}

$ar1 = [ 2, 3, 7, 10, 12, 15, 30, 34 ];
$ar2 = [ 1, 5, 7, 8, 10, 15, 16, 19 ];
$m = sizeof($ar1);
$n = sizeof($ar2);

echo "Maximum sum path is " . maxPathSum($ar1, $ar2, $m, $n);