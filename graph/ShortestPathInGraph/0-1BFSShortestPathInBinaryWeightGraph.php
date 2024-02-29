<?php

define('V', 9);

function addEdge($u, $v, $w): void
{
    global $edges;
    $edges[$u][] = [$v, $w];
    $edges[$v][] = [$u, $w];
}

function zeroOneBFS($src): void
{
    global $edges;
    $dist = array();
    for ($i = 0; $i < V; $i++) {
        $dist[$i] = PHP_INT_MAX;
    }
    $dist[$src] = 0;
    $q = array();
    array_push($q, $src);
    while (sizeof($q) > 0) {
        $u = array_shift($q);
        for ($i = 0; $i < sizeof($edges[$u]); $i++) {
            if ($dist[$edges[$u][$i][0]] > $dist[$u] + $dist[$edges[$u][$i][1]]) {
                $dist[$edges[$u][$i][0]] = $dist[$u] + $dist[$edges[$u][$i][1]];
                if ($edges[$u][$i][1] == 0) {
                    array_unshift($q, $edges[$u][$i][0]);
                } else {
                    array_push($q, $edges[$u][$i][0]);
                }
            }
        }
    }
    for ($i = 0; $i < V; $i++) {
        echo $dist[$i] . " ";
    }
}

$edges = array();

addEdge(0, 1, 0);
addEdge(0, 7, 1);
addEdge(1, 7, 1);
addEdge(1, 2, 1);
addEdge(2, 3, 0);
addEdge(2, 5, 0);
addEdge(2, 8, 1);
addEdge(3, 4, 1);
addEdge(3, 5, 1);
addEdge(4, 5, 1);
addEdge(5, 6, 1);
addEdge(6, 7, 1);
addEdge(7, 8, 1);

$src = 0;
zeroOneBFS($src);
