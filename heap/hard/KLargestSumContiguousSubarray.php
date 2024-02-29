<?php

function sort_desc($a,$b){
    return $b > $a;
}

function kthLargestSum($a,$n,$k){
    $result = array();
    for($i = 0; $i < $n; $i++){
        $sum = 0;
        for($j = $i; $j < $n; $j++){
            $sum += $a[$j];
            array_push($result,$sum);
        }
    }
    usort($result,'sort_desc');
    return $result[$k-1];
}

$a = [ 20, -5, -1 ];
$N = sizeof($a);
$K = 3;

echo kthLargestSum($a, $N, $K);