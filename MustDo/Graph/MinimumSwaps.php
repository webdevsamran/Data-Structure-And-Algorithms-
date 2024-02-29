<?php

function minSwaps($arr, $n){
    $arrPos = array();
    for($i = 0; $i < $n; $i++){
        $arrPos[$i][0] = $arr[$i];
        $arrPos[$i][1] = $i;
    }
    sort($arrPos);
    $vis = array_fill(0,$n,0);
    $ans = 0;
    for($i = 0; $i < $n; $i++){
        if($vis[$i] || $arrPos[$i][1] == $i){
            continue;
        }
        $cycleSize = 0;
        $j = $i;
        while(!$vis[$j]){
            $vis[$j] = 1;
            $j = $arrPos[$j][1];
            $cycleSize++;
        }
        if($cycleSize > 0){
            $ans += ($cycleSize - 1);
        }
    }
    return $ans;
}

$arr = [ 1, 5, 4, 3, 2 ];
$n = sizeof($arr);
echo minSwaps($arr, $n);