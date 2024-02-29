<?php

function isInterleaved($a,$b,$c){
    $m = strlen($a);
    $n = strlen($b);
    $IL = array_fill(0,$m+1,array_fill(0,$n+1,0));
    if($m+$n != strlen($c)){
        return false;
    }
    for($i = 0; $i <= $m; $i++){
        for($j = 0; $j <= $n; $j++){
            if($i == 0 && $j == 0){
                $IL[$i][$j] = true;
            }else if($i == 0){
                if($b[$j-1] == $c[$j-1]){
                    $IL[$i][$j] = $IL[$i][$j - 1];
                }
            }else if($j == 0){
                if($a[$i - 1] == $c[$i - 1]){
                    $IL[$i][$j] = $IL[$i - 1][$j];
                }
            }else if($a[$i - 1] == $c[$i + $j - 1] && $b[$j - 1] != $c[$i + $j - 1]){
                $IL[$i][$j] = $IL[$i - 1][$j];
            }else if($a[$i - 1] != $c[$i + $j - 1] && $b[$j - 1] == $c[$i + $j - 1]){
                $IL[$i][$j] = $IL[$i][$j - 1];
            }else if($a[$i - 1] == $c[$i + $j - 1] && $b[$j - 1] == $c[$i + $j - 1]){
                $IL[$i][$j] = ($IL[$i - 1][$j] || $IL[$i][$j - 1]);
            }
        }
    }
    return $IL[$m][$n];
}

function test($a,$b,$c){
    if(isInterleaved($a,$b,$c)){
        echo $c . " is interleaved of " . $a . " and " . $b . "<br/>";
    }else{
        echo $c . " is not interleaved of " . $a . " and " . $b . "<br/>";
    }
}

test("XXY", "XXZ", "XXZXXXY");
test("XY", "WZ", "WZXY");
test("XY", "X", "XXY");
test("YX", "X", "XXY");
test("XXY", "XXZ", "XXXXZY");