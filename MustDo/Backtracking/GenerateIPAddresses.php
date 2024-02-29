<?php

function solve($s,$i,$j,$level,$temp,&$res){
    if($i == $j + 1 && $level == 5){
        array_push($res, substr($temp,1));
    }
    for($k = $i; $k < $i + 3 && $k <= $j; $k++){
        $ad = substr($s,$i,$k - $i + 1);
        if(($s[$i] == '0' && strlen($ad) > 1) || (int)$ad > 255){
            return;
        }
        solve($s,$k+1,$j,$level+1,$temp.".".$ad,$res);
    }
}

$s = "25525511135";
$n = strlen($s);
$ans = array();
solve($s, 0, $n - 1, 1, "", $ans);
echo "<pre>";
print_r($ans);