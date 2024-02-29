<?php

define('V', 4);

class edge
{
    public $from;
    public $weight;

    function __construct($from, $weight)
    {
        $this->from = $from;
        $this->weight = $weight;
    }
}

$edges = array();

function addEdge($u, $v, $w): void
{
    $item = new edge($v, $w);
    $edges[$u][] = $item;
}

function shortestPath($dp): void
{
    global $edges;
    for ($i = 0; $i < V; $i++) {
        for ($j = 0; $j < V; $j++) {
            $dp[$i][$j] = -1;
        }
    }
    $dp[0][0] = 0;
    for ($i = 1; $i <= V; $i++) {
        for ($j = 0; $j < V; $j++) {
            for ($k = 0; $k < sizeof($edges[$j]); $k++) {
                if ($dp[$i - 1][$edges[$j][$k]->from] != -1) {
                    $curr_wt = $dp[$i - 1][$edges[$j][$k]->from] + $edges[$j][$k]->weight;
                    if ($dp[$i][$j] == -1) {
                        $dp[$i][$j] = $curr_wt;
                    } else {
                        $dp[$i][$j] = min($dp[$i][$j], $curr_wt);
                    }
                }
            }
        }
    }
}

function minWeight(): float
{
    $dp = array();
    shortestPath($dp);

    $avg = array();
    for ($i = 0; $i < V; $i++) {
        if ($dp[V][$i] != -1) {
            for ($j = 0; $j < V; $j++) {
                if ($dp[$j][$i] != -1) {
                    $avg[$i] = max($avg[$i], ((float)($dp[V][$i] - $dp[$j][$i]) / (V - $j)));
                }
            }
        }
    }
    $result = $avg[0];
    for ($i = 0; $i < V; $i++) {
        if ($avg[$i] != -1 && $avg[$i] < $result) {
            $result = $avg[$i];
        }
    }
    return $result;
}

addEdge(0, 1, 1);
addEdge(0, 2, 10);
addEdge(1, 2, 3);
addEdge(2, 3, 2);
addEdge(3, 1, 0);
addEdge(3, 0, 8);

echo minWeight();
