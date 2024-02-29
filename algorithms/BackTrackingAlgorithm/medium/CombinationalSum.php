<?php

function findNumbers(&$arr,$sum,&$res,&$r,$i){
    if($sum == 0){
        array_push($res,$r);
        return;
    }
    while($i < sizeof($arr) && ($sum - $arr[$i]) >= 0){
        array_push($r,$arr[$i]);
        findNumbers($arr,$sum-$arr[$i],$res,$r,$i);
        $i++;
        array_pop($r);
    }
}

function combinationSum(&$arr,$sum){
    sort($arr);
    $arr = array_unique($arr);
    $r = array();
    $res = array();
    findNumbers($arr,$sum,$res,$r,0);
    return $res;
}

$arr = array();
array_push($arr,2);
array_push($arr,4);
array_push($arr,6);
array_push($arr,8);
$n = sizeof($arr);

$sum = 8;
$res = combinationSum($arr, $sum);

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