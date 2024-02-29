<?php

function countSubarrWithEqualZeroAndOne($arr,$n){
    $map = array();
    $sum = 0;
    $count = 0;
    for($i = 0; $i < $n; $i++){
        if($arr[$i] == 0){
            $arr[$i] = -1;
        }
        $sum += $arr[$i];
        if($sum == 0){
            $count++;
        }
        if(array_key_exists($sum,$map)){
            $count += $map[$sum];
        }
        if(!array_key_exists($sum,$map)){
            $map[$sum] = 1;
        }else{
            $map[$sum]++;
        }
    }
    return $count;
}

$arr = [ 1, 0, 0, 1, 0, 1, 1 ];
$n = sizeof($arr);
echo "count = " . countSubarrWithEqualZeroAndOne($arr, $n);