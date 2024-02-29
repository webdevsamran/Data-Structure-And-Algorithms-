<?php

function make_graph($prerequisites){
    $graph = array();
    foreach($prerequisites as $arr){
        $graph[$arr[1]][] = $arr[0];
    }
    return $graph;
}

function compute_indegree($graph){
    $degrees = array_fill(0,sizeof($graph),0);
    foreach($graph as $neigh){
        foreach($neigh as $el){
            $degrees[$el]++;
        }
    }
    return $degrees;
}

function findOrder($n,$prerequisites){
    $graph = make_graph($prerequisites);
    $degrees = compute_indegree($graph);
    $zeros = new SplQueue;
    for($i = 0; $i < $n; $i++){
        if(!$degrees[$i]){
            $zeros->enqueue($i);
        }
    }
    $topsort = array();
    for($i = 0; $i < $n; $i++){
        if(empty($zeros)){
            return [];
        }
        $zero = $zeros->dequeue();
        array_push($topsort,$zero);
        foreach($graph[$zero] as $el){
            if(!--$degrees[$el]){
                $zeros->enqueue($el);
            }
        }
    }
    return $topsort;
}

$numTasks = 4;
$prerequisites = array();
array_push($prerequisites,[1, 0]);
array_push($prerequisites,[2, 1]);
array_push($prerequisites,[3, 2]);
$v = findOrder($numTasks, $prerequisites);

for ($i = 0; $i < sizeof($v); $i++) {
    echo $v[$i] . " ";
}