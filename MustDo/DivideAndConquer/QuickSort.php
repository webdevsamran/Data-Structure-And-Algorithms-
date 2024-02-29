<?php

function swap(&$a, &$b){
    $temp = $a;
    $a = $b;
    $b = $temp;
}

function partition(&$arr, $low, $high){
    $pivot = $arr[$high];
    $i = $low - 1;
    for($j = $low; $j < $high; $j++){
        if($arr[$j] < $pivot){
            $i++;
            swap($arr[$i],$arr[$j]);
        }
    }
    swap($arr[$i+1],$arr[$high]);
    return $i + 1;
}

function quickSort(&$arr, $low, $high){
    if($low < $high){
        $pi = partition($arr, $low, $high);
        quickSort($arr, $low, $pi - 1);
        quickSort($arr, $pi + 1, $high);
    }
}

$arr = [ 10, 7, 8, 9, 1, 5 ];
$N = sizeof($arr);
quickSort($arr, 0, $N - 1);
echo "Sorted array: <br/>";
for ($i = 0; $i < $N; $i++)
    echo $arr[$i] . " ";