<?php

function resultComb($ind, $target, &$ar, &$ds, &$ans){
    if($target == 0){
        array_push($ans, $ds);
        return;
    }
    while($ind < sizeof($ar) && $target - $ar[$ind] >= 0){
        array_push($ds, $ar[$ind]);
        resultComb($ind, $target - $ar[$ind], $ar, $ds, $ans);
        $ind++;
        array_pop($ds);
    }
}

function combinationSum($ar,$sum){
    $ds = array();
    $ans = array();
    sort($ar);
    resultComb(0, $sum, $ar, $ds, $ans);
    return $ans;
}

$ar = array();
array_push($ar,2);
array_push($ar,4);
array_push($ar,6);
array_push($ar,8);
$n = sizeof($ar);
$sum = 8;
$res = combinationSum($ar, $sum);
if (sizeof($res) == 0) {
    echo "Empty";
    return 0;
}
for ($i = 0; $i < sizeof($res); $i++) {
    if (sizeof($res[$i]) > 0) {
        echo " ( ";
        for ($j = 0; $j < sizeof($res[$i]); $j++)
            echo $res[$i][$j] . " ";
        echo ")";
    }
}