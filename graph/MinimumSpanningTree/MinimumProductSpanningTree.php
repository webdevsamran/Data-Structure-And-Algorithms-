<?php

define('V', 5);

function min_node($key, $set): int
{
    $min = PHP_INT_MAX;
    $min_index = NULL;
    for ($i = 0; $i < V; $i++) {
        if ($set[$i] == false && $min > $key[$i]) {
            $min = $key[$i];
            $min_index = $i;
        }
    }
    return $min_index;
}

function printMST($parent, $graph): void
{
    $minProduct = 1;
    for ($i = 1; $i < V; $i++) {
        echo $parent[$i] . " - " . $i . " : " . $graph[$i][$parent[$i]] . "<br/>";
        $minProduct *= $graph[$i][$parent[$i]];
    }
    echo "Min Product is: " . $minProduct;
}

function primMST($graph, $logGraph): void
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

    for ($count = 0; $count < V; $count++) {
        $u = min_node($key, $set);
        $set[$u] = true;
        for ($v = 0; $v < V; $v++) {
            if ($set[$v] == false && $logGraph[$u][$v] && $key[$v] > $logGraph[$u][$v]) {
                $parent[$v] = $u;
                $key[$v] = $logGraph[$u][$v];
            }
        }
    }
    printMST($parent, $graph);
}

function minimumProductMST($graph): void
{
    $logGraph = array();
    for ($i = 0; $i < V; $i++) {
        for ($j = 0; $j < V; $j++) {
            if ($graph[$i][$j] > 0) {
                $logGraph[$i][$j] = log($graph[$i][$j]);
            } else {
                $logGraph[$i][$j] = 0;
            }
        }
    }
    primMST($graph, $logGraph);
}

$graph = [
    [0, 2, 0, 6, 0],
    [2, 0, 3, 8, 5],
    [0, 3, 0, 0, 7],
    [6, 8, 0, 0, 9],
    [0, 5, 7, 9, 0],
];


minimumProductMST($graph);
