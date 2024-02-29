<?php

function bfsOfGraph($v,$adj){
    $visited = array_fill(0,$v,0);
    $queue = new SplQueue;
    $queue->enqueue(0);
    while(!$queue->isEmpty()){
        $i = $queue->dequeue();
        if($visited[$i]){
            continue;
        }
        $visited[$i] = true;
        echo $i . " ";
        foreach($adj[$i] as $v){
            if(!$visited[$v]){
                $queue->enqueue($v);
            }
        }
    }
}

$V = 5;
$adj = [
    [1,2,3],
    [],
    [4],
    [],
    []
];

bfsOfGraph($V,$adj);