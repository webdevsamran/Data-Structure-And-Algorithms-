<?php

function swap(&$a,&$b){
    $temp = $a;
    $a = $b;
    $b = $temp;
}

function partition(&$arr,$s,$e){
    $last = $arr[$e];
    $i = $s - 1;
    for($j = $s; $j < $e; $j++){
        if($arr[$j] < $last){
            $i++;
            swap($arr[$i],$arr[$j]);
        }
    }
    swap($arr[$i+1],$arr[$e]);
    return $i + 1;
}

function quickSort(&$arr,$s,$e){
    if($s < $e){
        $pi = partition($arr,$s,$e);
        quickSort($arr,$s,$pi-1);
        quickSort($arr,$pi+1,$e);
    }
}

$arr = [ 10, 7, 8, 9, 1, 5 ];
$N = sizeof($arr);
quickSort($arr, 0, $N - 1);
print_r($arr);