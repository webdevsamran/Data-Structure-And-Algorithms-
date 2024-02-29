<?php

function findLongestConseqSubseq($arr, $n){
    $set = array();
    $ans = 0;
    for($i = 0; $i < $n; $i++){
        array_push($set, $arr[$i]);
    }
    for($i = 0; $i < $n; $i++){
        if(in_array($arr[$i]-1,$set)){
            continue;
        }else{
            $j = $arr[$i];
            while(in_array($j,$set)){
                $j++;
            }
            $ans = max($ans, $j - $arr[$i]);
        }
    }
    return $ans;
}

$arr = [ 1, 9, 3, 10, 4, 20, 2 ];
$n = sizeof($arr);
echo "Length of the Longest contiguous subsequence is " . findLongestConseqSubseq($arr, $n);