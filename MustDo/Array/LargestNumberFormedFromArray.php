<?php

function compareVal($s1, $s2){
    $ns1 = $s1 . $s2;
    $ns2 = $s2 . $s1;
    for($i = 0; $i < strlen($ns1); $i++){
        if((int)$ns1[$i] < (int)$ns2[$i]){
            return true;
        }else if((int)$ns1[$i] > (int)$ns2[$i]){
            return false;
        }
    }
    return false;
}

function printLargest($arr, $n){
    usort($arr,'compareVal');
    echo "<pre>";
    print_r($arr);
    $ans = '';
    foreach($arr as $i){
        $ans .= (string)$i;
    }
    return $ans;
}

$N = 5;
$arr = [3, 30, 34, 5, 9];

echo printLargest($arr, $N);