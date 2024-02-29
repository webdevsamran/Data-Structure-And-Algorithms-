<?php

function fact($n){
    return ($n <= 1) ? 1 : $n * fact($n - 1);
}

function findSmallerInRight($str,$low,$high){
    $countRight = 0;
    $i = NULL;
    for($i = $low + 1; $i <= $high; $i++)
        if (ord($str[$i]) < ord($str[$low]))
            ++$countRight;
 
    return $countRight;
}

function findRank($str){
    $len = strlen($str);
    $mul = fact($len);
    $rank = 1;
    $countRight = NULL;
    for($i = 0; $i < $len; $i++){
        $mul /= $len - $i;
        $countRight = findSmallerInRight($str, $i, $len - 1);
        $rank += $countRight * $mul;
    }
    return $rank;
}

$str = "string";
echo findRank($str);