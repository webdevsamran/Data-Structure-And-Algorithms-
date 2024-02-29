<?php

function printUnion($arr1,$arr2,$m,$n){
    $i = 0;
    $j = 0;
    while($i < $m && $j < $n){
        if($arr1[$i] < $arr2[$j]){
            echo $arr1[$i] . " ";
            $i++;
        }else if($arr1[$i] > $arr2[$j]){
            echo $arr2[$j] . " ";
            $j++;
        }else{
            echo $arr1[$j] . " ";
            $i++;
        }
    }
    while($i < $m){
        echo $arr1[$i] . " ";
        $i++;
    }
    while($j < $n){
        echo $arr2[$j] . " ";
        $j++;
    }
}

$arr1 = [ 1, 2, 4, 5, 6 ];
$arr2 = [ 2, 3, 5, 7 ];
$m = sizeof($arr1);
$n = sizeof($arr2);
printUnion($arr1, $arr2, $m, $n);