<?php

function printArr(Array $arr) : void {
    $size = sizeof($arr);
    for($i = 0; $i < $size; $i++){
        echo $arr[$i]." ";
    }
    echo "<br/>\n";
}

function shellSort(Array &$arr) : void {
    $size = sizeof($arr);
    for($interval = $size/2; $interval > 0; $interval /= 2){
        for($i = $interval; $i < $size; $i += 1){
            $temp = $arr[$i];
            $j;
            for($j = $i; $j >= $interval && $arr[$j - $interval] > $temp; $j -= $interval){
                $arr[$j] = $arr[$j - $interval];
            }
            $arr[$j] = $temp;
        }
    }
}

$arr = [1, 12, 9, 5, 6, 10];
$size = sizeof($arr);
printArr($arr);
shellSort($arr);
printArr($arr);