<?php

function editDistDP($str1,$str2,$m,$n){
    $dp = array();
    for($i = 0; $i <= $m; $i++){
        for($j = 0; $j <= $n; $j++){
            if($i == 0){
                $dp[$i][$j] = $j;
            }else if($j == 0){
                $dp[$i][$j] = $i;
            }else if($str1[$i-1] == $str2[$j-1]){
                $dp[$i][$j] = $dp[$i-1][$j-1];
            }else{
                $dp[$i][$j] = 1 + min($dp[$i][$j-1],$dp[$i-1][$j],$dp[$i-1][$j-1]);
            }
        }
    }
    return $dp[$m][$n];
}

$str1 = "sunday";
$str2 = "saturday";
echo editDistDP($str1, $str2, strlen($str1), strlen($str2));