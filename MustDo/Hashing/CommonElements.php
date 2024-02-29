<?php

function findCommon($ar1, $ar2, $ar3, $n1, $n2, $n3){
    $uset1 =  $uset2 = $ans = array();
    for($i = 0; $i < $n1; $i++){
        $uset1[$ar1[$i]]++;
    }
    for($i = 0; $i < $n2; $i++){
        $uset2[$ar2[$i]]++;
    }
    for($i = 0; $i < $n3; $i++){
        if(array_key_exists($ar3[$i],$uset1) && array_key_exists($ar3[$i],$uset2)){
            array_push($ans, $ar3[$i]);
        }
    }
    sort($ans);
    print_r($ans);
}

$ar1 = [ 1, 5, 10, 20, 40, 80 ];
$ar2 = [ 6, 7, 20, 80, 100 ];
$ar3 = [ 3, 4, 15, 20, 30, 70, 80, 120 ];
$n1 = sizeof($ar1);
$n2 = sizeof($ar2);
$n3 = sizeof($ar3);
echo "Common Elements are; <br/>";
findCommon($ar1, $ar2, $ar3, $n1, $n2, $n3);