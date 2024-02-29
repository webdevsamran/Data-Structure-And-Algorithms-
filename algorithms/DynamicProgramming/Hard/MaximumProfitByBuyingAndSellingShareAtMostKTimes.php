<?php

function solve($j, $i, $b, $A, $B, &$dp){
    if($dp[$i][$j][$b] != -1){
        return $dp[$i][$j][$b];
    }
    if($i == $B){
        return 0;
    }
    if($j == 0){
        return 0;
    }
    $res = NULL;
    if($b == 1){
        $res = max(-$A[$i] + solve($j, $i + 1, 0, $A, $B, $dp), solve($j, $i + 1, 1, $A, $B, $dp));
    }else{
        $res = max($A[$i] + solve($j - 1, $i + 1, 1, $A, $B, $dp), solve($j, $i + 1, 0, $A, $B, $dp));
    }
    return $dp[$i][$j][$b] = $res;
}

function maxProfit($k,$n,$price){
    $A = $price;
    $B = $n;
    $dp = array();
    for($i = 0; $i <= $n; $i++){
        for($j = 0; $j <= $k; $j++){
            $dp[$i][$j][0] = -1;
            $dp[$i][$j][1] = -1;
        }
    }
    return solve($k,0,1,$A,$B,$dp);
}

$k1 = 3;
$price1 = [12, 14, 17, 10, 14, 13, 12, 15];
$n1 = sizeof($price1);
echo "Maximum profit is: " . maxProfit($k1, $n1, $price1) . "<br/>";
$k2 = 2;
$price2 = [10, 22, 5, 75, 65, 80];
$n2 = sizeof($price2);
echo "Maximum profit is: " . maxProfit($k2, $n2, $price2);