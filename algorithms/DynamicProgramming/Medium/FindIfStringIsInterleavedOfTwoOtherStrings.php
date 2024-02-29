<?php

function dfs($i, $j, $n, $m, &$a, &$b, &$c, &$dp){
    if($dp[$i][$j] != -1){
        return $dp[$i][$j];
    }
    if($i == $n && $j == $m){
        return 1;
    }
    if($i < $n && $a[$i] == $c[$i+$j] && $j < $m && $b[$j] == $c[$i + $j]){
        $x = dfs($i+1,$j,$n,$m,$a,$b,$c,$dp);
        $y = dfs($i,$j+1,$n,$m,$a,$b,$c,$dp);
        return $dp[$i][$j] = $x | $y;
    }
    if($i < $n && $a[$i] == $c[$i+$j]){
        $x = dfs($i+1,$j,$n,$m,$a,$b,$c,$dp);
        return $dp[$i][$j] = $x;
    }
    if($j < $m && $b[$j] == $c[$i+$j]){
        $y = dfs($i,$j+1,$n,$m,$a,$b,$c,$dp);
        return $dp[$i][$j] = $y;
    }
    return $dp[$i][$j] = 0;
}

function isInterleave($a,$b,$c){
    $n = strlen($a);
    $m = strlen($b);
    if(($n+$m) != strlen($c)){
        return false;
    }
    $dp = array_fill(0,$n+1,array_fill(0,$m+1,-1));
    return dfs(0, 0, $n, $m, $a, $b, $c, $dp);
}

function test($a,$b,$c){
    if(isInterleave($a,$b,$c))
        echo $c . " is interleaved of " . $a . " and " . $b . "<br/>";
    else
        echo $c . " is not interleaved of " . $a . " and " . $b . "<br/>";
}

test("XXY", "XXZ", "XXZXXXY");
test("XY", "WZ", "WZXY");
test("XY", "X", "XXY");
test("YX", "X", "XXY");
test("XXY", "XXZ", "XXXXZY");
test("ACA", "DAS", "DAACSA");