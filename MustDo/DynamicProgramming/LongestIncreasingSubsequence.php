<?php

function lis($arr, $n){
    $lis = array();
    $lis[0] = 1;
    for($i = 1; $i < $n; $i++){
        $lis[$i] = 1;
        for($j = 0; $j < $i; $j++){
            if($arr[$i] > $arr[$j] && $lis[$i] < $lis[$j] + 1){
                $lis[$i] = $lis[$j] + 1;
            }
        }
    }
    return max($lis);
}

$arr = [ 10, 22, 9, 33, 21, 50, 41, 60 ];
$n = sizeof($arr);
printf("Length of lis is %d", lis($arr, $n));