<?php

function ElementsCalculationFunc($pre,$maxx,$x,$k,$n){
    for($i = 0, $j = $x; $j <= $n; $j++,$i++){
        if($x * $maxx[$j] - ($pre[$j] - $pre[$i]) <= $k){
            return true;
        }
    }
    return false;
}

function MaxNumberOfElements($arr,$n,$k){
    sort($arr);
    $pre = array_fill(0,$n+1,0);
    $maxx = array_fill(0,$n+1,0);
    for($i = 1; $i <= $n; $i++){
        $pre[$i] = $pre[$i-1] + $arr[$i-1];
        $maxx[$i] = max($maxx[$i-1],$arr[$i-1]);
    }
    $l = 1;
    $r = $n;
    $ans = NULL;
    while($l < $r){
        $mid = (int)(($l+$r)/2);
        if(ElementsCalculationFunc($pre,$maxx,$mid-1,$k,$n)){
            $ans = $mid;
            $l = $mid + 1;
        }else{
            $r = $mid - 1;
        }
    }
    echo $ans . " ";
}

$arr = [ 2, 4, 9 ];
$n = sizeof($arr);
$k = 3;
MaxNumberOfElements($arr, $n, $k);