<?php

define('mod',100000007);

function decodeMessage(&$dp, $s, &$str, $n){
    if($s >= $n){
        return 1;
    }
    if($dp[$s] != -1){
        return $dp[$s];
    }
    $num = $tc = 0;
    for($i = $s; $i < $n; $i++){
        $num = $num * 10 + (int)($str[$i]);
        if($num >= 1 && $num <= 26){
            $c = decodeMessage($dp,$s+1,$str,$n);
            $tc = ($tc % mod + $c % mod) % mod;
        }else{
            break;
        }
    }
    return $dp[$s] = $tc;
}

function CountWays($str){
    $n = strlen($str);
    if(!$n){
        return 1;
    }
    $dp = array_fill(0,$n,-1);
    return decodeMessage($dp,0,$str,$n);
}

$str = "1234";
echo CountWays($str);