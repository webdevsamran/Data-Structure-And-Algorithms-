<?php

function floydWarshall($dist, $size): void
{
    for ($k = 0; $k < $size; $k++) {
        for ($i = 0; $i < $size; $i++) {
            for ($j = 0; $j < $size; $j++) {
                if (($dist[$i][$k] != 'INF') && ($dist[$k][$j] != 'INF')) {
                    if ($dist[$i][$j] > $dist[$i][$k] + $dist[$k][$j]) {
                        $dist[$i][$j] = $dist[$i][$k] + $dist[$k][$j];
                    }
                }
            }
        }
    }
    printSolution($dist, $size);
}

function printSolution($dist, $size): void
{
    echo "The Distance is: ";
    for ($i = 0; $i < $size; $i++) {
        for ($j = 0; $j < $size; $j++) {
            if ($dist[$i][$j] == 'INF') {
                echo "INF ";
            } else {
                echo $dist[$i][$j] . " ";
            }
        }
        echo "<br/>";
    }
}

$graph = [
    [0,25],
    [-1,0]
];
$size = sizeof($graph);

floydWarshall($graph, $size);
