<?php

function longestSubsequence($arr,$size){
    $map = array();
    $count = PHP_INT_MIN;
    $dp = array_fill(0,$size,0);
    for($i = 0; $i < $size; $i++){
        if(array_key_exists(abs($arr[$i]-1),$map)){
            $lastIndex = $map[$arr[$i]-1];
            $dp[$i] = 1 + $dp[$lastIndex];
        }else{
            $dp[$i] = 1;
        }
        $map[$arr[$i]] = $i;
        $count = max($count,$dp[$i]);
    }
    echo "<pre>";
    print_r($dp);
    return $count;
}

$a = [ 3, 10, 3, 11, 4, 5, 6, 7, 8, 12 ];
$n = sizeof($a);
echo longestSubsequence($a, $n);