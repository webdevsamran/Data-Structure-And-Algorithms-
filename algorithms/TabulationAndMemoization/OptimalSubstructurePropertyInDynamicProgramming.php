<?php

define('V', 4);

function floydWarshall($graph)
{
    $dp = array();
    for ($i = 0; $i < V; $i++) {
        for ($j = 0; $j < V; $j++) {
            $dp[$i][$j] = $graph[$i][$j];
        }
    }
    for ($k = 0; $k < V; $k++) {
        for ($i = 0; $i < V; $i++) {
            for ($j = 0; $j < V; $j++) {
                $dp[$i][$j] = min($dp[$i][$j], $graph[$i][$k] + $graph[$k][$j]);
            }
        }
    }
    for ($i = 0; $i < V; $i++) {
        for ($j = 0; $j < V; $j++) {
            if ($dp[$i][$j] == PHP_INT_MAX) {
                echo "INF ";
            } else {
                echo $dp[$i][$j] . " ";
            }
        }
        echo "<br/>";
    }
}

$graph = [
    [0, 5, PHP_INT_MAX, 10],
    [PHP_INT_MAX, 0, 3, PHP_INT_MAX],
    [PHP_INT_MAX, PHP_INT_MAX, 0, 1],
    [PHP_INT_MAX, PHP_INT_MAX, PHP_INT_MAX, 0]
];

floydWarshall($graph);
