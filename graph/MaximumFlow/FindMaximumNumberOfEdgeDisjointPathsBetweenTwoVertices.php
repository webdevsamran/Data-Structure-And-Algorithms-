<?php

define('SIZE', 8);

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

function findDisjointPaths($graph, $s, $t): int
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
    return $max_flow;
}

$graph = [
    [0, 1, 1, 1, 0, 0, 0, 0],
    [0, 0, 1, 0, 0, 0, 0, 0],
    [0, 0, 0, 1, 0, 0, 1, 0],
    [0, 0, 0, 0, 0, 0, 1, 0],
    [0, 0, 1, 0, 0, 0, 0, 1],
    [0, 1, 0, 0, 0, 0, 0, 1],
    [0, 0, 0, 0, 0, 1, 0, 1],
    [0, 0, 0, 0, 0, 0, 0, 0]
];

$s = 0;
$t = 7;
echo "There can be maximum " . findDisjointPaths($graph, $s, $t) . " edge-disjoint paths from " . $s . " to " . $t;
