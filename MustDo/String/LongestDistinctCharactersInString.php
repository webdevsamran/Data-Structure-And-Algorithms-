<?php

function longestSubstrDistinctChars($s){
    $i = $j = $currlen = 0;
    $maxi = -1;
    $map = array();
    $n = strlen($s);
    while($j < $n){
        while(isset($map[$s[$j]]) && $map[$s[$j]] >= $i){
            $i = $map[$s[$j]] + 1;
            $currlen = $j - $i;
        }
        $map[$s[$j]] = $j;
        $j++;
        $currlen++;
        if($currlen > $maxi){
            $maxi = $currlen;
        }
    }
    return $maxi;
}

$s = "geeksforgeeks";
echo longestSubstrDistinctChars($s);