<?php

function dfsUtil($i,$adj,&$visited){
    if($visited[$i]){
        return;
    }
    $visited[$i] = true;
    echo $i . " ";
    foreach($adj[$i] as $v){
        if(!$visited[$v]){
            dfsUtil($v,$adj,$visited);
        }
    }
}

function dfsOfGraph($v, $adj){
    $visited = array_fill(0,$v,0);
    for($i = 0; $i < $v; $i++){
        dfsUtil($i,$adj,$visited);
    }
}

$V = 5;
$adj = [
    [2,3,1],
    [0],
    [0,4],
    [0],
    [2]
];

dfsOfGraph($V,$adj);