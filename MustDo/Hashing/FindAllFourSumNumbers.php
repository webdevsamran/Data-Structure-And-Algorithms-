<?php

function twoSum($arr, $n){
    $map = array();
    for($i = 0; $i < $n - 1; $i++){
        for($j = $i + 1; $j < $n; $j++){
            $map[$arr[$i] + $arr[$j]][0] = $i;
            $map[$arr[$i] + $arr[$j]][1] = $j;
        }
    }
    return $map;
}

function fourSum($X,$arr,$map,$n){
    // $temp = array_fill(0,$n,0);
    for($i = 0; $i < $n - 1; $i++){
        for($j = $i + 1; $j < $n; $j++){
            $curr_sum = $arr[$i] + $arr[$j];
            if(array_key_exists(($X-$curr_sum),$map)){
                $p = $map[($X-$curr_sum)];
                if($p[0] != $i && $p[1] != $j && $p[0] != $j && $p[1] != $i){
                    echo $arr[$i] . "," . $arr[$j] . "," . $arr[$p[0]] . "," . $arr[$p[1]] . "<br/>";
                }
            }
        }
    }
}

$arr = [ 10, 2, 3, 4, 5, 7, 8 ];
$n = sizeof($arr);
$X = 23;
$Map = twoSum($arr, $n);
fourSum($X, $arr, $Map, $n);