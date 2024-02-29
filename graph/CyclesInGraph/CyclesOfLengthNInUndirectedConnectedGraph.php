<?php

function DFS($graph, &$marked, $len, $vert, $start, &$count): void
{
    $size = sizeof($graph);
    $marked[$vert] = true;
    if ($len == 0) {
        $marked[$vert] = false;
        if ($graph[$vert][$start] && $graph[$start][$vert]) {
            $count++;
            return;
        } else {
            return;
        }
    }
    for ($i = 0; $i < $size; $i++) {
        if (!$marked[$i] && $graph[$vert][$i]) {
            DFS($graph, $marked, $len - 1, $i, $start, $count);
        }
    }
    $marked[$vert] = false;
}

function countCycles($graph, $length): int
{
    $size = sizeof($graph);
    $marked = array();
    $count = 0;
    for ($i = 0; $i < $size; $i++) {
        $marked[$i] = 0;
    }
    for ($i = 0; $i < ($size - $length + 1); $i++) {
        DFS($graph, $marked, $length - 1, $i, $i, $count);
        $marked[$i] = 1;
    }
    return $count / 2;
}

$graph = [
    [0, 1, 0, 1, 0],
    [1, 0, 1, 0, 1],
    [0, 1, 0, 1, 0],
    [1, 0, 1, 0, 1],
    [0, 1, 0, 1, 0]
];
$length = 4;
echo "Total Cycles are: " . countCycles($graph, $length) . ".<br/>";
