<?php

function countDeletions($str1,$str2){
    $arr = array();
    for($i = 0; $i < strlen($str1); $i++){
        $arr[$str1[$i]]++;
    }
    for($i = 0; $i < strlen($str2); $i++){
        $arr[$str2[$i]]--;
    }
    $ans = 0;
    foreach($arr as $key => $val){
        if($val > 0){
            $ans++;
        }
    }
    return $ans;
}

$str1 = "bcadeh";
$str2 = "hea";
echo countDeletions($str1, $str2);