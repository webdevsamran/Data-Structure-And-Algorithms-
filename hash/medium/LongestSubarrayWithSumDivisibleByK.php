<?php

function longestSubarrWthSumDivByK($arr,$size,$k){
    $map = array();
    $cur_sum = 0;
    $max_len = 0;

    for($i = 0; $i < $size; $i++){
        $cur_sum += $arr[$i];
        $mod = ($cur_sum % $k);
        if($mod == 0){
            $max_len = $i + 1;
        }else if(!array_key_exists($mod,$map)){
            $map[$mod] = $i;
        }else{
            if($max_len < ($i - $map[$mod])){
                $max_len = $i - $map[$mod];
            }
        }
    }
    return $max_len;
}

$arr = [ 2, 7, 6, 1, 4, 5 ];
$n = sizeof($arr);
$k = 3;

echo "Length = " . longestSubarrWthSumDivByK($arr, $n, $k);