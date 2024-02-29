<?php

function buyMaximumProducts($n,$k,$price){
    $v = array();
    for($i = 0; $i < $n; $i++){
        array_push($v,[$price[$i],$i+1]);
    }
    sort($v);
    $ans = 0;
    for($i = 0; $i < $n; $i++){
        $ans += min($v[$i][1],(int)($k/$v[$i][0]));
        $k -= $v[$i][0] * min($v[$i][1],(int)($k/$v[$i][0]));
    }
    return $ans;
}

$price = [ 10, 7, 19 ];
$n = sizeof($price);
$k = 45;
echo buyMaximumProducts($n, $k, $price) . "<br/>";