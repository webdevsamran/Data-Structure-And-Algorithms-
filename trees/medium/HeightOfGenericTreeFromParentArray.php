<?php

$adj = array();

function build_tree($parent,$size){
    global $adj;
    $root_index = 0;
    for($i = 0; $i < $size; $i++){
        if($parent[$i] == -1){
            $root_index = $i;
        }else{
            $adj[$i][] = $parent[$i];
            $adj[$parent[$i]][] = $i;
        }
    }
    return $root_index;
}

function BFS($start){
    global $adj;
    $visited = array();
    $queue = new SplQueue;
    $queue->enqueue([$start,0]);
    $max_level_reached = 0;

    while(!$queue->isEmpty()){
        $p = $queue->dequeue();
        $visited[$p[0]] = 1;
        $max_level_reached = max($max_level_reached,$p[1]);
        for($i = 0; $i < sizeof($adj[$p[0]]); $i++){
            if(!isset($visited[$adj[$p[0]][$i]])){
                $queue->enqueue([$adj[$p[0]][$i],$p[1]+1]);
            }
        }
    }
    
    return $max_level_reached;
}

$parent = [ -1, 0, 1, 2, 3 ];
$n = sizeof($parent);
$root_index = build_tree($parent, $n);
$ma = BFS($root_index);
echo "Height of N-ary Tree = " . $ma;