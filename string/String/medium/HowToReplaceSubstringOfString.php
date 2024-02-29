<?php

function computeLPS($str){
    $lps = array();
    $len = 0;
    $lps[0] = 0;
    $i = 1;
    while($i < strlen($str)){
        if($str[$i] == $str[$len]){
            $len++;
            $lps[$i] = $len;
            $i++;
        }else{
            if($len == 0){
                $lps[$i] = 0;
                $i++;
            }else{
                $len = $lps[$len - 1];
            }
        }
    }
    return $lps;
}

function modifyString($str,$s1,$s2){
    $lps = computeLPS($s1);
    $i = $j = 0;
    $found = array();
    while($i < strlen($str)){
        if($str[$i] == $s1[$j]){
            $i++;
            $j++;
        }
        if($j == strlen($s1)){
            array_push($found,($i-$j));
            $j = $lps[$j - 1];
        }else if($i < strlen($str) && $str[$i] != $s1[$j]){
            if($j == 0){
                $i++;
            }else{
                $j = $lps[$j- 1];
            }
        }
    }
    $ans = '';
    $prev = 0;
    for($k = 0; $k < sizeof($found); $k++){
        if($found[$k] < $prev){
            continue;
        }
        $substr = substr($str,$prev,$found[$k]-$prev);
        $ans .= $substr;
        $ans .= $s2;
        $prev = $found[$k] + strlen($s1);
    }
    $substr = substr($str,$prev,strlen($str)-$prev);
    $ans .= $substr;
    echo $ans;
}

$S = "geeksforgeeks";
$S1 = "eek";
$S2 = "ok";
modifyString($S, $S1, $S2);