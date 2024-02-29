<?php

function swap(&$a,&$b){
    $temp = $a;
    $a = $b;
    $b = $temp;
}

function maxHeapify(&$arr,$i,$N){
    $left = 2 * $i + 1;
    $right = 2 * $i + 2;
    $largest = $i;
    if($left < $N && $arr[$left] > $arr[$largest]){
        $largest = $left;
    }
    if($right < $N && $arr[$right] > $arr[$largest]){
        $largest = $right;
    }
    if($largest != $i){
        swap($arr[$i],$arr[$largest]);
        maxHeapify($arr,$largest,$N);
    }
}

function convertMaxHeap(&$arr,$N){
    for($i = (int)(($N-2)/2); $i >= 0; $i--){
        maxHeapify($arr,$i,$N);
    }
}

function printArray($arr,$N){
    for($i = 0; $i < $N; $i++){
        echo $arr[$i] . " ";
    }
    echo "<br/>";
}

$arr = [ 3, 5, 9, 6, 8, 20, 10, 12, 18, 9 ];
$N = sizeof($arr);

echo "Min Heap array : ";
printArray($arr, $N);

convertMaxHeap($arr, $N);

echo "<br/>Max Heap array : ";
printArray($arr, $N);