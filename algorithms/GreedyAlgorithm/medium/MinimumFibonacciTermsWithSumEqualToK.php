<?php

function calcFiboTerms(&$fiboTerms,$k){
    $i = 3;
    array_push($fiboTerms,0);
    array_push($fiboTerms,1);
    array_push($fiboTerms,1);

    while(true){
        $nextTerm = $fiboTerms[$i-1] + $fiboTerms[$i-2];
        if($nextTerm > $k){
            return;
        }
        array_push($fiboTerms,$nextTerm);
        $i++;
    }
}

function findMinTerms($k){
    $fiboTerms = array();
    calcFiboTerms($fiboTerms, $k);
    $count = 0;
    $j = sizeof($fiboTerms)-1;
    while($k > 0){
        $count += (int)($k / $fiboTerms[$j]);
        $k %= $fiboTerms[$j];
        $j--;
    }
    return $count;
}

$K = 17;
echo findMinTerms($K);