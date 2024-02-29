<?php

function bfs($forest,$i,$j,&$visited){
    $visited[$i][$j] = 1;
    $queue = new SplQueue;
    $queue->enqueue([$i,$j]);

    while(!$queue->isEmpty()){
        $curr = $queue->dequeue();
        $dx = [-1, 0, 1, 0];
        $dy = [0, 1, 0, -1];
        for($k = 0; $k < 4; $k++){
            $nx = $curr[0] + $dx[$k];
            $ny = $curr[1] + $dy[$k];
            if($nx >= 0 && $ny >= 0 && $nx < sizeof($forest) && $ny < sizeof($forest[0]) && $forest[$nx][$ny] && !$visited[$nx][$ny]){
                $queue->enqueue([$nx,$ny]);
                $visited[$nx][$ny] = 1;
            }
        }
    }
}

function count_trees_in_forest($forest){
    $count = 0;
    $m = sizeof($forest);
    $n = sizeof($forest[0]);
    $visited = array_fill(0,$m,array_fill(0,$n,0));

    for($i = 0; $i < $m; $i++){
        for($j = 0; $j < $n; $j++){
            if($forest[$i][$j] && !$visited[$i][$j]){
                bfs($forest,$i,$j,$visited);
                $count++;
            }
        }
    }

    return $count;
}

$forest = [
    [0, 1, 1, 0, 0],
    [0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0],
    [0, 0, 0, 0, 1],
    [0, 0, 0, 0, 0]
];
$num_trees = count_trees_in_forest($forest);
echo "The forest has " . $num_trees . " trees." . "<br/>";