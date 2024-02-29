<?php

function minJumps($arr, $n){
    $jumps = array();
    if($n == 0 || $arr[0] == 0){
        return 0;
    }
    $jumps[0] = 0;
    for($i = 1; $i < $n; $i++){
        $jumps[$i] = PHP_INT_MAX;
        for($j = 0; $j < $i; $j++){
            if($i <= $j + $arr[$j] && $jumps[$j] != PHP_INT_MAX){
                $jumps[$i] = min($jumps[$i], $jumps[$j] + 1);
                break;
            }
        }
    }
    return $jumps[$n-1];
}

$arr = [ 1, 3, 5, 8, 9, 2, 6, 7, 6, 8, 9 ];
$size = sizeof($arr);
echo "Minimum number of jumps to reach end is: " . minJumps($arr, $size);