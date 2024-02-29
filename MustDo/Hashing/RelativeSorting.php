<?php

function sortA1ByA2(&$arr1,&$arr2,&$ans){
    $map = array();
    $ind = 0;
    for($i = 0; $i < sizeof($arr1); $i++){
        $map[$arr1[$i]] += 1;
    }
    for($i = 0; $i < sizeof($arr2); $i++){
        if($map[$arr2[$i]] != 0){
            for($j = 1; $j <= $map[$arr2[$i]]; $j++){
                $ans[$ind++] = $arr2[$i];
            }
        }
        unset($map[$arr2[$i]]);
    }
    foreach($map as $el => $f){
        for($j = 1; $j <= $f; $j++){
            $ans[$ind++] = $el;
        }
    }
}

$arr1 = [ 2, 1, 2, 5, 7, 1, 9, 3, 6, 8, 8, 7, 5, 6, 9, 7, 5 ];
$arr2 = [ 2, 1, 8, 3, 4, 1 ];
$ans = array();
sortA1ByA2($arr1, $arr2, $ans);
print_r($ans);