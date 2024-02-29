<?php

function findRoot($arr,$n){
    $root = 0;
    for($i = 0; $i < $n; $i++){
        $root += ($arr[$i][0] - $arr[$i][1]);
    }
    return $root;
}

$arr = [[1, 5], [2, 0], [3, 0], [4, 0], [5, 5], [6, 5]];
$n = sizeof($arr);
printf("%d<br/>", findRoot($arr, $n));