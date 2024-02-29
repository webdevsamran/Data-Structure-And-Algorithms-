<?php

function MatrixChainOrder($arr,$n){
    $m = array();
    for($i = 0; $i < $n; $i++){
        $m[$i][$i] = 0;
    }
    for($L = 2; $L < $n; $L++){
        for($i = 1; $i < $n - $L +1; $i++){
            $j = $i + $L -1;
            $m[$i][$j] = PHP_INT_MAX;
            for($k = $i; $k <= $j - 1; $k++){
                $q = $m[$i][$k] + $m[$k+1][$j] + ($arr[$i-1] * $arr[$k] * $arr[$j]);
                if($q < $m[$i][$j]){
                    $m[$i][$j] = $q;
                }
            }
        }
    }
    return $m[1][$n-1];
}

$arr = [ 1, 2, 3, 4 ];
$size = sizeof($arr);
echo "Minimum number of multiplications is " . MatrixChainOrder($arr, $size);