<?php

define("SIZE", 6);

function BFS($rGraph, $s, $t, $parent): bool
{
    $visited = array();
    for ($i = 0; $i < SIZE; $i++) {
        $visited[$i] = false;
    }
    $visited[$s] = true;
    $parent[$s] = -1;
    $queue = new SplQueue();
    $queue->enqueue($s);
    while (!$queue->isEmpty()) {
        $u = $queue->dequeue();
        for ($v = 0; $v < SIZE; $v++) {
            if ($visited[$v] == false && $rGraph[$u][$v] > 0) {
                $visited[$v] = true;
                $parent[$v] = $u;
                $queue->enqueue($v);
            }
        }
    }
    return ($visited[$t] == true);
}

function dfs($graph, $s, &$visited): void
{
    $visited[$s] = true;
    for ($i = 0; $i < SIZE; $i++) {
        if (!$visited[$i] && $graph[$s][$i]) {
            dfs($graph, $i, $visited);
        }
    }
}

function minCut($graph, $s, $t): void
{
    $rGraph = array();
    for ($i = 0; $i < SIZE; $i++) {
        for ($j = 0; $j < SIZE; $j++) {
            $rGraph[$i][$j] = $graph[$i][$j];
        }
    }
    $parent = new SplFixedArray(SIZE);
    $max_flow = 0;
    while (BFS($rGraph, $s, $t, $parent)) {
        $path_flow = PHP_INT_MAX;
        for ($v = $t; $v != $s; $v = $parent[$v]) {
            $u = $parent[$v];
            $path_flow = min($path_flow, $rGraph[$u][$v]);
        }
        for ($v = $t; $v != $s; $v = $parent[$v]) {
            $u = $parent[$v];
            $rGraph[$u][$v] -= $path_flow;
            $rGraph[$v][$u] += $path_flow;
        }
        $max_flow += $path_flow;
    }
    $visited = array_fill(0, SIZE, 0);
    dfs($rGraph, $s, $visited);
    for ($i = 0; $i < SIZE; $i++)
        for ($j = 0; $j < SIZE; $j++)
            if ($visited[$i] && !$visited[$j] && $graph[$i][$j])
                echo $i . " - " . $j . "<br/>";

    return;
}

$graph = [
    [0, 16, 13, 0, 0, 0],
    [0, 0, 10, 12, 0, 0],
    [0, 4, 0, 0, 14, 0],
    [0, 0, 9, 0, 0, 20],
    [0, 0, 0, 7, 0, 4],
    [0, 0, 0, 0, 0, 0]
];

minCut($graph, 0, 5);
