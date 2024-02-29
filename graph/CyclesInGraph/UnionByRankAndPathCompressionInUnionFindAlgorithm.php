<?php

use Graph as GlobalGraph;

class Edge
{
    public $src;
    public $dest;
}

class Subset
{
    public $parent;
    public $rank;
}

class Graph
{
    public $V;
    public $E;
    public $edge;

    function __construct($V, $E)
    {
        $this->V = $V;
        $this->E = $E;
        $this->edge = array();
        for ($i = 0; $i < $E; $i++) {
            $this->edge[$i] = new Edge;
        }
    }
}

function find($subsets, $i)
{
    if ($subsets[$i]->parent != $i) {
        $subsets[$i]->parent = find($subsets, $subsets[$i]->parent);
    }
    return $subsets[$i]->parent;
}

function Union($subsets, $xroot, $yroot): void
{
    if ($subsets[$xroot]->rank < $subsets[$yroot]->rank) {
        $subsets[$xroot]->parent = $yroot;
    } else if ($subsets[$xroot]->rank > $subsets[$yroot]->rank) {
        $subsets[$yroot]->parent = $xroot;
    } else {
        $subsets[$yroot]->parent = $xroot;
        $subsets[$xroot]->rank++;
    }
}

function isCycle($graph): int
{
    $V = $graph->V;
    $E = $graph->E;
    $subsets = array();
    for ($v = 0; $v < $V; $v++) {
        $subsets[$v] = new Subset;
        $subsets[$v]->parent = $v;
        $subsets[$v]->rank = 0;
    }
    for ($e = 0; $e < $E; $e++) {
        $x = find($subsets, $graph->edge[$e]->src);
        $y = find($subsets, $graph->edge[$e]->dest);
        if ($x == $y) {
            return 1;
        }
        Union($subsets, $x, $y);
    }
    return 0;
}

$V = 3;
$E = 3;
$graph = new Graph($V, $E);

// add edge 0-1
$graph->edge[0]->src = 0;
$graph->edge[0]->dest = 1;

// add edge 1-2
$graph->edge[1]->src = 1;
$graph->edge[1]->dest = 2;

// add edge 0-2
$graph->edge[2]->src = 0;
$graph->edge[2]->dest = 2;

if (isCycle($graph))
    echo "Graph contains cycle";
else
    echo "Graph doesn't contain cycle";
