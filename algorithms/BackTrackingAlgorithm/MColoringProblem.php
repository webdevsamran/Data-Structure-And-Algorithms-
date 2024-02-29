<?php

define('V', 4);

function isSafe($v, $graph, $color, $c)
{
    for ($i = 0; $i < V; $i++) {
        if ($graph[$v][$i] && $c == $color[$i]) {
            return false;
        }
    }
    return true;
}

function graphColoringUtil($graph, $m, &$color, $v)
{
    if ($v == V) {
        return true;
    }
    for ($c = 1; $c <= $m; $c++) {
        if (isSafe($v, $graph, $color, $c)) {
            $color[$v] = $c;
            if (graphColoringUtil($graph, $m, $color, $v + 1) == true) {
                return true;
            }
            $color[$v] = 0;
        }
    }
    return false;
}

function graphColoring($graph, $m)
{
    $color = array();
    for ($i = 0; $i < V; $i++) {
        $color[$i] = 0;
    }
    if (graphColoringUtil($graph, $m, $color, 0) == false) {
        echo "Solution does not exist.<br/>";
        return false;
    }

    printSolution($color);
    return true;
}

function printSolution($color)
{
    echo "Solution Exists: Following are the assigned colors: <br/>";
    for ($i = 0; $i < V; $i++)
        echo " " . $color[$i] . " ";
    echo "<br/>";
}

$graph = [
    [0, 1, 1, 1],
    [1, 0, 1, 0],
    [1, 1, 0, 1],
    [1, 0, 1, 0],
];

// Number of colors
$m = 3;

// Function call
graphColoring($graph, $m);
