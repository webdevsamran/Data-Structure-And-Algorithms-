<?php

function countStrings($n){
    $a = $b = 1;
    for($i = 1; $i < $n; $i++){
        $temp = $a + $b;
        $b = $a;
        $a = $temp;
    }
    return $a + $b;
}

echo countStrings(3);