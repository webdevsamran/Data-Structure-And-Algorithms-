<?php

function countSink($n,$m,$edgeFrom,$edgeTo){
    $mark = array_fill(0,$n,0);
    for($i = 0; $i < $m; $i++){
        $mark[$edgeFrom[$i]] = 1;
    }
    $count = 0;
    for($i = 1; $i <= $n; $i++){
        if(!$mark[$i]){
            $count++;
        }
    }
    return $count;
}

$n = 4;
$m = 2;
$edgeFrom = [ 2, 4 ];
$edgeTo = [ 3, 3 ];

echo countSink($n, $m, $edgeFrom, $edgeTo) . "<br/>";