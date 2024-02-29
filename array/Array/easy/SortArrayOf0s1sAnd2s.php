<?php

function swap(&$a,&$b){
    $temp = $a;
    $a = $b;
    $b = $temp;
}

function sort012(&$arr,$n){
    $lo = 0;
    $high = $n - 1;
    $mid = 0;
    while($mid <= $high){
        switch($arr[$mid]){
            case '0':
                swap($arr[$lo++],$arr[$mid++]);
                break;
            case '1':
                $mid++;
                break;
            case '2':
                swap($arr[$mid],$arr[$high--]);
                break;
        }
    }
}

$arr = [ 0, 1, 1, 0, 1, 2, 1, 2, 0, 0, 0, 1 ];
$n = sizeof($arr);
sort012($arr, $n);
print_r($arr);