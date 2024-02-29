<?php

define('V',5);

function isSafe($v,$graph,$path,$pos){
    if($graph[$path[$pos-1]][$v] == 0){
        return false;
    }
    for($i = 0; $i < $pos; $i++){
        if($path[$i] == $v){
            return false;
        }
    }
    return true;
}

function hamCycleUtil($graph,&$path,$pos){
    if($pos == V){
        if($graph[$path[$pos-1]][$path[0]] == 1){
            return true;
        }else{
            return false;
        }
    }
    for($v = 1; $v < V; $v++){
        if(isSafe($v,$graph,$path,$pos)){
            $path[$pos] = $v;
            if(hamCycleUtil($graph,$path,$pos+1)){
                return true;
            }
            $path[$pos] = -1;
        }
    }
    return false;
}

function hamCycle($graph){
    $path = array_fill(0,V,-1);
    $path[0] = 0;
    if(hamCycleUtil($graph,$path,1) == false){
        echo "<br/>Solution doesn't exist";
        return false;
    }
    printSolution($path);
    return true;
}

function printSolution($path){
    echo "Solution Exists: Following is one Hamiltonian Cycle <br/>";
    for ($i = 0; $i < V; $i++)
        echo $path[$i] . " ";
    echo $path[0] . " ";
    echo "<br/>";
}

$graph1 = [
    [0, 1, 0, 1, 0],
    [1, 0, 1, 1, 1],
    [0, 1, 0, 0, 1],
    [1, 1, 0, 0, 1],
    [0, 1, 1, 1, 0]
];
hamCycle($graph1);
$graph2 = [
    [0, 1, 0, 1, 0],
    [1, 0, 1, 1, 1],
    [0, 1, 0, 0, 1],
    [1, 1, 0, 0, 0],
    [0, 1, 1, 0, 0]
];
hamCycle($graph2);