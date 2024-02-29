<?php

function findLongestConseqSubseq($arr,$n){
    $set = array();
    $ans = 0;
    for($i = 0; $i < $n; $i++){
        $set[$arr[$i]] = 1;
    }
    for($i = 0; $i < $n; $i++){
        $j = $arr[$i];
        while(array_key_exists($j,$set)){
            $j++;
        }
        $ans = max($ans, $j - $arr[$i]);
    }
    return $ans;
}

$arr = [ 1, 9, 3, 10, 4, 20, 2 ];
$n = sizeof($arr);
echo "Length of the Longest contiguous subsequence is " . findLongestConseqSubseq($arr, $n);