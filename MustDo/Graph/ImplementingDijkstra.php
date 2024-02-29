<?php

define('V', 9);

function minDistance($dist, $set): int
{
    $min = PHP_INT_MAX;
    $min_index = NULL;
    for ($i = 0; $i < V; $i++) {
        if ($set[$i] == false && $dist[$i] <= $min) {
            $min_index = $i;
            $min = $dist[$i];
        }
    }
    return $min_index;
}

function printSolution($dist)
{
    echo "Graph is : ";
    for ($i = 0; $i < V; $i++) {
        echo $i . " : " . $dist[$i] . "<br/>";
    }
}

function dijkstra($graph, $source): void
{
    $dist = array();
    $set = array();
    for ($i = 0; $i < V; $i++) {
        $dist[$i] = PHP_INT_MAX;
        $set[$i] = false;
    }
    $dist[$source] = 0;
    for ($i = 0; $i < V - 1; $i++) {
        $u = minDistance($dist, $set);
        $set[$u] = true;
        for ($v = 0; $v < V; $v++) {
            if (!$set[$v] && $graph[$u][$v] && $dist[$u] != PHP_INT_MAX && $dist[$v] > $dist[$u] + $graph[$u][$v]) {
                $dist[$v] = $dist[$u] + $graph[$u][$v];
            }
        }
    }
    printSolution($dist);
}

$graph = [
    [0, 4, 0, 0, 0, 0, 0, 8, 0],
    [4, 0, 8, 0, 0, 0, 0, 11, 0],
    [0, 8, 0, 7, 0, 4, 0, 0, 2],
    [0, 0, 7, 0, 9, 14, 0, 0, 0],
    [0, 0, 0, 9, 0, 10, 0, 0, 0],
    [0, 0, 4, 14, 10, 0, 2, 0, 0],
    [0, 0, 0, 0, 0, 2, 0, 1, 6],
    [8, 11, 0, 0, 0, 0, 1, 0, 7],
    [0, 0, 2, 0, 0, 0, 6, 7, 0]
];

dijkstra($graph, 0);
