<?php

function sort_desc($a,$b){
    return $b > $a;
}

function maximizeTheFirstArray($A,$B,$n){
    $temp1 = $A;
    $temp2 = $B;
    usort($temp1,'sort_desc');
    usort($temp2,'sort_desc');
    $map = array();
    $i = $j = 0;
    while(sizeof($map) < $n){
        if($temp1[$i] >= $temp2[$j]){
            $map[$temp1[$i]]++;
            $i++;
        }else{
            $map[$temp2[$i]]++;
            $j++;
        }
    }
    $res = array();
    for($i = 0; $i < $n; $i++){
        if(array_key_exists($A[$i],$map)){
            array_push($res,$A[$i]);
        }
    }
    for($i = 0; $i < $n; $i++){
        if(array_key_exists($B[$i],$map) && $map[$B[$i]] == 1){
            array_push($res,$B[$i]);
        }
    }
    print_r($res);
}

$A = [ 9, 7, 2, 3, 6 ];
$B = [ 7, 4, 8, 0, 1 ];
$n = sizeof($A);
maximizeTheFirstArray($A, $B, $n);