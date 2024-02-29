<?php

define('V',5);

function isBipartiteUtil($G,$src,&$color){
    $color[$src] = 1;
    $queue = new SplQueue;
    $queue->enqueue($src);

    while(!$queue->isEmpty()){
        $u = $queue->dequeue();
        for($v = 0; $v < V; $v++){
            if($G[$u][$v] && $color[$v] == -1){
                $color[$v] = 1 - $color[$u];
                $queue->enqueue($v);
            }else if($G[$u][$v] && $color[$u] == $color[$v]){
                return false;
            }
        }
    }

    return true;
}

function isBipartite($G){
    $color = array_fill(0,V,-1);
    for($i = 0; $i < V; $i++){
        if($color[$i] == -1){
            if (!isBipartiteUtil($G, $i, $color))
                return false;
        }
    }
    return true;
}

function canBeDividedinTwoCliques($G){
    $GC = array();
    for($i = 0; $i < V; $i++){
        for($j = 0; $j < V; $j++){
            $GC[$i][$j] = ($i != $j) ?  !$G[$i][$j] : 0;
        }
    }
    return  isBipartite($GC);
}

$G = [
    [0, 1, 1, 1, 0],
    [1, 0, 1, 0, 0],
    [1, 1, 0, 0, 0],
    [0, 1, 0, 0, 1],
    [0, 0, 0, 1, 0]
];

echo canBeDividedinTwoCliques($G) ? "Yes" : "No";