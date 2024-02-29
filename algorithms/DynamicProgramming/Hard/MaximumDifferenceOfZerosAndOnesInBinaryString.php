<?php

define('MAX',100);

function allones($s,$n){
    $co = 0;
    for($i = 0; $i < $n; $i++){
        $co += ($s[$i] == '1');
    }
    return ($co == $n);
}

function findlength($arr,$s,$n,$ind,$st,&$dp){
    if($ind >= $n){
        return 0;
    }
    if($dp[$ind][$st] != -1){
        return $dp[$ind][$st];
    }
    if($st == 0){
        return $dp[$ind][$st] = max($arr[$ind] + findlength($arr,$s,$n,$ind+1,1,$dp), findlength($arr,$s,$n,$ind+1,0,$dp));
    }else{
        return $dp[$ind][$st] = max($arr[$ind] + findlength($arr,$s,$n,$ind+1,1,$dp), 0);
    }
}

function maxLen($s,$n){
    if(allones($s,$n)){
        return -1;
    }
    $arr = array_fill(0,MAX,0);
    for($i = 0; $i < $n; $i++){
        $arr[$i] = ($s[$i] == '0' ? 1 : -1);
    }
    $dp = array_fill(0,MAX,array_fill(0,3,-1));
    return findlength($arr, $s, $n, 0, 0, $dp);
}

$s = "11000010001";
$n = 11;
echo maxLen($s, $n);