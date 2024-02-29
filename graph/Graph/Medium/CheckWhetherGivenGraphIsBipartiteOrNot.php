<?php

define('V',4);

function isBipartite($g,$src){
    $colorArr = array_fill(0,V,-1);
    $colorArr[$src] = 1;
    $queue = new SplQueue;
    $queue->enqueue($src);
    while(!$queue->isEmpty()){
        $u = $queue->dequeue();
        if($g[$u][$u] == 1){
            return false;
        }
        for($v = 0; $v < V; $v++){
            if($g[$u][$v] && $colorArr[$v] == -1){
                $colorArr[$v] = 1 - $colorArr[$u];
                $queue->enqueue($v);
            }else if($g[$u][$v] && $colorArr[$u] == $colorArr[$v]){
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