<?php

function countPairs($arr,$sum){
    $n = sizeof($arr);
    sort($arr);
    $i = 0;
    $j = $n-1;
    $count = 0;
    while($i < $j){
        if($arr[$i] + $arr[$j] == $sum){
            $count++;
            $i++;
            $j--;
        }else if($arr[$i] + $arr[$j] > $sum){
            $j--;
        }else{
            $i++;
        }
    }
    echo "Total Pairs are: " . $count;
}

$arr = [1,5,7,-1];
countPairs($arr,6);