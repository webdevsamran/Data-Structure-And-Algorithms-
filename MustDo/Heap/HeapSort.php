<?php

function swap(&$a, &$b){
    $temp = $a;
    $a = $b;
    $b = $temp;
}

function heapify(&$arr, $n, $i){
    $left = 2 * $i + 1;
    $right = 2 * $i + 2;
    $largest = $i;
    if($left < $n && $arr[$left] > $arr[$largest]){
        $largest = $left;
    }
    if($right < $n && $arr[$right] > $arr[$largest]){
        $largest = $right;
    }
    if($largest != $i){
        swap($arr[$i],$arr[$largest]);
        heapify($arr,$n,$largest);
    }
}

function heapSort(&$arr, $n){
    for($i = (int)($n /2) - 1; $i >= 0; $i--){
        heapify($arr,$n,$i);
    }
    for($i = $n - 1; $i >= 0; $i--){
        swap($arr[0],$arr[$i]);
        heapify($arr,$i,0);
    }
}

function printArray($arr, $n){
    for($i = 0; $i < $n; $i++){
        echo $arr[$i] . " ";
    }
    echo "<br/>";
}

$arr = [ 12, 11, 13, 5, 6, 7 ];
$N = sizeof($arr);
heapSort($arr, $N);
echo "Sorted array is: <br/>";
printArray($arr, $N);