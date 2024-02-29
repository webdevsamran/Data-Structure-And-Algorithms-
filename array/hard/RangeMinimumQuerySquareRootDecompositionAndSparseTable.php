<?php

define('MAX',500);
$lookup = array();

function preprocess($arr,$n){
    global $lookup;
    for($i = 0; $i < $n; $i++){
        $lookup[$i][0] = $i;
    }
    for($j = 1; (1 << $j) <= $n; $j++){
        for($i = 0; ($i + (1 << $j) -1) < $n; $i++){
            if($arr[$lookup[$i][$j-1]] < $arr[$lookup[$i + (1 << ($j - 1))][$j-1]]){
                $lookup[$i][$j] = $lookup[$i][$j-1];
            }else{
                $lookup[$i][$j] = $lookup[$i + (1 << ($j - 1))][$j-1];
            }
        }
    }
    echo "<pre>";
    print_r($lookup);
}

function query($arr,$l,$r){
    global $lookup;
    $j = (int)log(($r-$l+1),2);
    if ($arr[$lookup[$l][$j]] <= $arr[$lookup[$r - (1 << $j) + 1][$j]])
        return $arr[$lookup[$l][$j]];
    else
        return $arr[$lookup[$r - (1 << $j) + 1][$j]];
}

function RMQ($a,$n,$q,$m){
    preprocess($a,$n);
    for($i = 0; $i < $m; $i++){
        $L = $q[$i][0];
        $R = $q[$i][1];
        echo "Minimum of [" . $L . ", " . $R . "] is " . query($a, $L, $R) . "<br/>";
    }
}

$a = [ 7, 2, 3, 0, 5, 10, 3, 12, 18 ];
$n = sizeof($a);
$q = [ [ 0, 4 ], [ 4, 7 ], [ 7, 8 ] ];
$m = sizeof($q);
RMQ($a, $n, $q, $m);