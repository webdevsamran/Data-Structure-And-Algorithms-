<?php

define('V',4);

function isBipartite($G,$src){
    $color = array_fill(0,V,-1);
    $color[$src] = 1;
    $queue = new SplQueue;
    $queue->enqueue($src);

    while(!$queue->isEmpty()){
        $u = $queue->dequeue();
        if($G[$u][$u]){
            return false;
        }
        for($v = 0; $v < V; $v++){
            if($G[$u][$v] && $color[$v] == -1){
                $color[$v] = 1 - $color[$u];
                $queue->enqueue($v);
            }else if($G[$u][$v] && $color[$v] == $color[$u]){
                return false;
            }
        }
    }

    return true;
}

$G = [
    [0, 1, 0, 1],
    [1, 0, 1, 0],
    [0, 1, 0, 1],
    [1, 0, 1, 0]
];
 
echo isBipartite($G, 0) ? "Yes" : "No";