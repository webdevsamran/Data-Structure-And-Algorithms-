<?php

define('MAX',100);
$lcslen = 0;
$dp = array();

function lcs($str1,$str2,$len1,$len2,$i,$j){
    global $dp;
    if($i == $len1 || $j == $len2){
        return 0;
    }
    if($dp[$i][$j] != -1){
        return $dp[$i][$j];
    }
    $dp[$i][$j] = 0;
    if($str1[$i] == $str2[$j]){
        $dp[$i][$j] = 1 + lcs($str1,$str2,$len1,$len2,$i+1,$j+1);
    }else{
        $dp[$i][$j] = max(lcs($str1,$str2,$len1,$len2,$i+1,$j),lcs($str1,$str2,$len1,$len2,$i,$j+1));
    }
    return $dp[$i][$j];
}

function printAll($str1,$str2,$len1,$len2,&$data,$idx1,$idx2,$currlcs){
    global $lcslen;
    global $dp;
    if($currlcs == $lcslen){
        echo implode('',$data) . "<br/>";
        return;
    }
    if($idx1 == $len1 || $idx2 == $len2){
        return;
    }
    for($char = ord('a'); $char <= ord('z'); $char++){
        $done = false;
        for($i = $idx1; $i < $len1; $i++){
            if(chr($char) == $str1[$i]){
                for($j = $idx2; $j < $len2; $j++){
                    if(chr($char) == $str2[$j] && $dp[$i][$j] == $lcslen - $currlcs){
                        $data[$currlcs] = chr($char);
                        printAll($str1, $str2, $len1, $len2, $data, $i+1, $j+1, $currlcs+1);
                        $done = true;
                        break;
                    }
                }
            }
            if($done){
                break;
            }
        }
    }
}

function prinlAllLCSSorted($str1,$str2){
    global $dp;
    global $lcslen;
    $len1 = strlen($str1);
    $len2 = strlen($str2);
    $str1 = str_split($str1);
    $str2 = str_split($str2);
    $dp = array_fill(0,MAX,array_fill(0,MAX,-1));
    $lcslen = lcs($str1, $str2, $len1, $len2, 0, 0);
    $data = array();
    printAll($str1, $str2, $len1, $len2, $data, 0, 0, 0);
    echo "<pre>";
    print_r($data);
}

$str1 = "abcabcaa";
$str2 = "acbacba";
prinlAllLCSSorted($str1, $str2);