<?php

$k = 1001;
$dp = array_fill(0,$k,array_fill(0,$k,-1));

function lps(&$s,$n1,$n2){
    global $dp;
    global $n;
    if($n1 == 0 || $n2 == 0){
        return 0;
    }
    if($dp[$n1][$n2] != -1){
        return $dp[$n1][$n2];
    }
    if($s[$n1-1] == $s[$n -$n2]){
        return $dp[$n1][$n2] = 1 + lps($s,$n1-1,$n2-1);
    }else{
        return $dp[$n1][$n2] = max(lps($s, $n1 - 1, $n2), lps($s, $n1, $n2 - 1));
    }
}

$s = "GEEKSFORGEEKS";
$n = strlen($s);
echo "The length of the LPS is " . lps($s, $n, $n);