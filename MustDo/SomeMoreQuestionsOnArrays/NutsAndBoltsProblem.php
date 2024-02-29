<?php

function partition(&$arr, $low, $high, $pivot){
    $i = $low;
    $temp1 = $temp2 = NULL;
    for($j = $low; $j < $high; $j++){
        if($arr[$j] < $pivot){
            $temp1 = $arr[$i];
            $arr[$i] = $arr[$j];
            $arr[$j] = $temp1;
            $i++;
        }else if($arr[$j] == $pivot){
            $temp1 = $arr[$j];
            $arr[$j] = $arr[$high];
            $arr[$high] = $temp1;
            $j--;
        }
    }
    $temp2 = $arr[$i];
    $arr[$i] = $arr[$high];
    $arr[$high] = $temp2;
    return $i;
}

function matchPairs(&$nuts, &$bolts, $low, $high){
    if($low < $high){
        $pivot = partition($nuts, $low, $high, $bolts[$high]);
        partition($bolts, $low, $high, $nuts[$pivot]);
        matchPairs($nuts, $bolts, $low, $pivot - 1);
        matchPairs($nuts, $bolts, $pivot + 1, $high);
    }
}

$nuts = ['@', '#', '$', '%', '^', '&'];
$bolts = ['$', '%', '&', '^', '@', '#'];
matchPairs($nuts, $bolts, 0, 5);
echo "Matched nuts and bolts are : <br/>";
print_r($nuts);
print_r($bolts);