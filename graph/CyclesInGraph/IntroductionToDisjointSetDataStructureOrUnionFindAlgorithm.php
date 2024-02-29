<?php

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

function find($parent, $i)
{
    if ($parent[$i] == $i) {
        return $i;
    }
    return find($parent, $parent[$i]);
}

function Union(&$parent, $x, $y): void
{
    $parent[$x] = $y;
}

function isCycle($graph): int
{
    $V = $graph->V;
    $E = $graph->E;
    $parent = array();
    for ($v = 0; $v < $V; $v++) {
        $parent[$v] = $v;
    }
    for ($e = 0; $e < $E; $e++) {
        $x = find($parent, $graph->edge[$e]->src);
        $y = find($parent, $graph->edge[$e]->dest);
        if ($x == $y) {
            return 1;
        }
        Union($parent, $x, $y);
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
