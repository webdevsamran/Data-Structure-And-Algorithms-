<?php

function LargestTripletMultiplication($arr,$n){
    $q = new SplMaxHeap;
    for($i = 0; $i < $n; $i++){
        $q->insert($arr[$i]);
        if($q->count() < 3){
            echo "-1" . "<br/>";
        }else{
            $x = $q->extract();
            $y = $q->extract();
            $z = $q->extract();
            $ans = $x * $y * $z;
            echo $ans . "<br/>";
            $q->insert($x);
            $q->insert($y);
            $q->insert($z);
        }
    }
    return;
}

$arr = [ 1, 2, 3, 4, 5 ];
$n = sizeof($arr);
LargestTripletMultiplication($arr, $n);