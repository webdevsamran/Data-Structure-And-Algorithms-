<?php

function sortK(&$arr,$n,$k){
    $minHeap = new SplMinHeap;
    for($i = 0; $i <= $k; $i++){
        $minHeap->insert($arr[$i]);
    }
    $index = 0;
    for($i = $k + 1; $i < $n; $i++){
        $arr[$index++] = $minHeap->extract();
        $minHeap->insert($arr[$i]);
    }
    while(!$minHeap->isEmpty()){
        $arr[$index++] = $minHeap->extract();
    }
}

function printArray($arr,$size){
    for($i = 0; $i < $size; $i++){
        echo $arr[$i]." ";
    }
    echo "<br/>";
}

$k = 3;
$arr = [ 2, 6, 3, 12, 56, 8 ];
$n = sizeof($arr);

sortK($arr, $n, $k);
printArray($arr, $n);