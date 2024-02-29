<?php

function swap(&$a,&$b){
    $temp = $a;
    $a = $b;
    $b = $temp;
}

function merge(&$arr1, &$arr2, $n, $m){
    $i = $n-1;
    $j = 0;
    while($i > 0 && $j < $m){
        if($arr2[$j] < $arr1[$i]){
            swap($arr2[$j], $arr1[$i]);
            $i--;
        }else{
            $j++;
        }
    }
    sort($arr1);
    sort($arr2);
}

$n = 2;
$arr1 = [10, 12];
$m = 3;
$arr2 = [5, 18, 20];

merge($arr1, $arr2, $n, $m);
print_r($arr1);
print_r($arr2);