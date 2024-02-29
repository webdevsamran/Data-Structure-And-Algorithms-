<?php

function make_graph($numTasks,$prerequisites){
    $graph = array();
    foreach($prerequisites as $arr){
        $graph[$arr[1]][] = $arr[0];
    }
    return $graph;
}

function compute_indegree($graph){
    $degrees = array_fill(0,sizeof($graph),0);
    foreach($graph as $val){
        foreach($val as $el){
            $degrees[$el]++;
        }
    }
    return $degrees;
}

function canFinish($numTasks,$prerequisites){
    $graph = make_graph($numTasks,$prerequisites);
    $degree = compute_indegree($graph);
    for($i = 0; $i < $numTasks; $i++){
        for($j = 0; $j < $numTasks; $j++){
            if(!$degree[$j]){
                break;
            }
        }
        if($j == $numTasks){
            break;
        }
        $degree[$j] = -1;
        foreach($graph[$j] as $neigh){
            $degree[$neigh]--;
        }
    }
    return true;
}

$numTasks = 4;
$prerequisites = array();
array_push($prerequisites,[1, 0]);
array_push($prerequisites,[2, 1]);
array_push($prerequisites,[3, 2]);
if (canFinish($numTasks, $prerequisites)) {
    echo "Possible to finish all tasks";
} else {
    echo "Impossible to finish all tasks";
}