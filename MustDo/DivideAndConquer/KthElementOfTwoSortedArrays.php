<?php

function find($a, $b, $m, $n, $k_req){
    $i = $j = $k = 0;
    while($i < $m && $j < $n){
        if($a[$i] < $b[$j]){
            $k++;
            if($k == $k_req){
                return $a[$i];
            }
            $i++;
        }else{
            $k++;
            if($k == $k_req){
                return $b[$j];
            }
            $j++;
        }
    }
    while($i < $m){
        $k++;
        if($k == $k_req){
            return $a[$i];
        }
        $i++;
    }
    while($j < $n){
        $k++;
        if($k == $k_req){
            return $b[$j];
        }
        $j++;
    }
}

$A = [ 2, 3, 6, 7, 9 ];
$B = [ 1, 4, 8, 10 ];
$k = 5;
echo find($A, $B, 5, 4, $k);