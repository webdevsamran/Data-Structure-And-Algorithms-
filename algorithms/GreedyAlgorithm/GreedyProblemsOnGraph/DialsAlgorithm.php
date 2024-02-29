<?php

class Graph
{
    public $size;
    public $list;

    function __construct($size)
    {
        $this->size = $size;
        $this->list = array();
    }

    public function addEdge($u, $v, $w): void
    {
        $this->list[$u][] = [$v, $w];
        $this->list[$v][] = [$u, $w];
    }

    public function shortestPath($src, $weight): void
    {
        $dist = array();
        $B = array();
        for ($i = 0; $i < $this->size; $i++) {
            $dist[$i][0] = PHP_INT_MAX;
        }
        $dist[$src][0] = 0;
        $B[0][] = $src;
        $idx = 0;
        while (1) {
            while (sizeof($B[$idx]) == 0 && $idx < $weight * $this->size) {
                $idx++;
            }
            if ($idx == $weight * $this->size) {
                break;
            }
            $u = array_shift($B[$idx]);
            foreach ($this->list[$u] as $val) {
                $v = $val[0];
                $w = $val[1];

                $du = $dist[$u][0];
                $dv = $dist[$v][0];

                if ($dv > $du + $w) {
                    if ($dv = PHP_INT_MAX) {
                    }
                }
            }
        }
    }
}

$V = 9;
$graph  = new Graph($V);

// making above shown graph
$graph->addEdge(0, 1, 4);
$graph->addEdge(0, 7, 8);
$graph->addEdge(1, 2, 8);
$graph->addEdge(1, 7, 11);
$graph->addEdge(2, 3, 7);
$graph->addEdge(2, 8, 2);
$graph->addEdge(2, 5, 4);
$graph->addEdge(3, 4, 9);
$graph->addEdge(3, 5, 14);
$graph->addEdge(4, 5, 10);
$graph->addEdge(5, 6, 2);
$graph->addEdge(6, 7, 1);
$graph->addEdge(6, 8, 6);
$graph->addEdge(7, 8, 7);

// maximum weighted edge - 14
$graph->shortestPath(0, 14);
