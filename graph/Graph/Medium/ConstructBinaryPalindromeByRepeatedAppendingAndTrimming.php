<?php

function dfs($parent, &$ans, $connectchars){
    $ans[$parent] = 1;
    for($i = 0; $i < sizeof($connectchars[$parent]); $i++){
        if(!$ans[$connectchars[$parent][$i]]){
            dfs($connectchars[$parent][$i], $ans, $connectchars);
        }
    }
}

function printBinaryPalindrome($n, $k){
    $arr = $ans = array_fill(0, $n, 0);
    $connectchars = array();
    for($i = 0; $i < $n; $i++){
        $arr[$i] = $i % $k;
    }
    for($i = 0; $i < (int)($n/2); $i++){
        $connectchars[$arr[$i]][] = $arr[$n - $i - 1];
        $connectchars[$arr[$n - $i - 1]][] = $arr[$i];
    }
    dfs(0,$ans,$connectchars);
    for ($i = 0; $i < $n; $i++)
        echo $ans[$arr[$i]];
}

$n = 10;
$k = 4;
printBinaryPalindrome($n, $k);