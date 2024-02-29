<?php

function getSubstringWithEqual012($str){
    $n = strlen($str);
    $mp = array();
    $mp[serialize([0,0])] = 1;
    $zc = $oc = $tc = $res = 0;
    for($i = 0; $i < $n; $i++){
        if($str[$i] == '0'){
            $zc++;
        }else if($str[$i] == '1'){
            $oc++;
        }else if($str[$i] == '2'){
            $tc++;
        }
        $tmp = [$zc-$oc,$zc-$tc];
        $res = $res + $mp[serialize($tmp)];
        $mp[serialize($tmp)]++;
    }
    return $res;
}

$str = "0102010";
echo getSubstringWithEqual012($str);