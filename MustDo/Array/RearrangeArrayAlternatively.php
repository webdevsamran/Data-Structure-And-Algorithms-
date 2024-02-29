<?php

function rearrange(&$arr, $n){
    $lastIdx = $n - 1;
    $firstIdx = 0;
    $maxi = $arr[$n - 1] + 1;
    for($i = 0; $i < $n; $i++){
        if($i % 2 == 0){
            $arr[$i] += ($arr[$lastIdx] % $maxi) * $maxi;
            $lastIdx--;
        }else{
            $arr[$i] += ($arr[$firstIdx] % $maxi) * $maxi;
            $firstIdx++;
        }
    }
    for($i = 0; $i < $n; $i++){
        $arr[$i] = (int)($arr[$i] / $maxi);
    }
}

$n = 6;
$arr = [1,2,3,4,5,6];
rearrange($arr,$n);
echo "<pre>";
print_r($arr);