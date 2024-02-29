<?php

function negCyclefloydWarshall($graph, $size): bool
{
    $dist = array();
    for ($i = 0; $i < $size; $i++) {
        for ($j = 0; $j < $size; $j++) {
            $dist[$i][$j] = $graph[$i][$j];
        }
    }
    for ($k = 0; $k < $size; $k++) {
        for ($i = 0; $i < $size; $i++) {
            for ($j = 0; $j < $size; $j++) {
                if ($dist[$i][$j] > $dist[$i][$k] + $dist[$k][$j]) {
                    $dist[$i][$j] = $dist[$i][$k] + $dist[$k][$j];
                }
            }
        }
    }
    for ($i = 0; $i < $size; $i++) {
        if ($dist[$i][$i] < 0) {
            return true;
        }
    }
    return false;
}

$graph = [
    [0, 1, INF, INF],
    [INF, 0, -1, INF],
    [INF, INF, 0,  -1],
    [-1, INF, INF,   0]
];
$size = sizeof($graph);

if (negCyclefloydWarshall($graph, $size))
    echo "Yes";
else
    echo "No";
