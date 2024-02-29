<?php

define('V', 5);

function minKey($key, $set): int
{
    $min = PHP_INT_MAX;
    $min_index = NULL;
    for ($v = 0; $v < V; $v++) {
        if ($set[$v] == false && $min > $key[$v]) {
            $min = $key[$v];
            $min_index = $v;
        }
    }
    return $min_index;
}

function printMST($parent, $graph): void
{
    echo "Edge \t Weight \n<br/>";
    for ($i = 1; $i < V; $i++) {
        echo $parent[$i] . " - " . $i . " " . $graph[$i][$parent[$i]] . "<br/>";
    }
}

function primMST($graph): void
{
    $parent = array();
    $key = array();
    $set = array();

    for ($i = 0; $i < V; $i++) {
        $key[$i] = PHP_INT_MAX;
        $set[$i] = false;
    }

    $key[0] = 0;
    $parent[0] = -1;

    for ($count = 1; $count < V - 1; $count++) {
        $u = minKey($key, $set);
        $set[$u] = true;
        for ($v = 0; $v < V; $v++) {
            if ($set[$v] == false && $graph[$u][$v] && $key[$v] > $graph[$u][$v]) {
                $key[$v] = $graph[$u][$v];
                $parent[$v] = $u;
            }
        }
    }
    printMST($parent, $graph);
}


$graph = [
    [0, 2, 0, 6, 0],
    [2, 0, 3, 8, 5],
    [0, 3, 0, 0, 7],
    [6, 8, 0, 0, 9],
    [0, 5, 7, 9, 0]
];

primMST($graph);
