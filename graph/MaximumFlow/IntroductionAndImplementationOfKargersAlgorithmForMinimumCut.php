<?php

class Edge
{
    public $src;
    public $dest;

    function __construct($_src = NULL, $_dest = NULL)
    {
        $this->src = $_src;
        $this->dest = $_dest;
    }
}

class Subset
{
    public $parent;
    public $rank;

    function __construct($_parent = NULL, $_rank = NULL)
    {
        $this->parent = $_parent;
        $this->rank = $_rank;
    }
}

class Graph
{
    public $V;
    public $E;
    public $edges;

    function __construct($v, $e)
    {
        $this->V = $v;
        $this->E = $e;
        $this->edges = array();
    }

    public function find($subset, $i)
    {
        if ($subset[$i]->parent == $i) {
            return $i;
        }
        return $subset[$i]->parent = $this->find($subset, $subset[$i]->parent);
    }

    public function union(&$subset, $x, $y): void
    {
        $x_root = $this->find($subset, $x);
        $y_root = $this->find($subset, $y);

        if ($subset[$x_root]->rank < $subset[$y_root]->rank) {
            $subset[$x_root]->parent = $y_root;
        } else if ($subset[$x_root]->rank > $subset[$y_root]->rank) {
            $subset[$y_root]->parent = $x_root;
        } else {
            $subset[$y_root]->parent = $x_root;
            $subset[$x_root]->rank++;
        }
    }
}

function kargerMinCut($graph): int
{
    $V = $graph->V;
    $E = $graph->E;
    $edges = $graph->edges;
    $subsets = array();
    for ($v = 0; $v < $V; $v++) {
        $subsets[] = new Subset($v, 0);
    }
    $vertices = $V;
    while ($vertices > 2) {
        $i = rand(0, $E - 1);
        $subset1 = $graph->find($subsets, $edges[$i]->src);
        $subset2 = $graph->find($subsets, $edges[$i]->dest);
        if ($subset1 == $subset2) {
            continue;
        } else {
            printf(
                "Contracting edge %d-%d<br/>",
                $edges[$i]->src,
                $edges[$i]->dest
            );
            $vertices--;
            $graph->union($subsets, $subset1, $subset2);
        }
    }
    $cutedges = 0;
    for ($i = 0; $i < $E; $i++) {
        $subset1 = $graph->find($subsets, $edges[$i]->src);
        $subset2 = $graph->find($subsets, $edges[$i]->dest);
        if ($subset1 != $subset2)
            $cutedges++;
    }

    return $cutedges;
}

$V = 4;
$E = 5;
$graph = new Graph($V, $E);

// add edge 0-1
$graph->edges[] = new Edge(0, 1);

// add edge 0-2
$graph->edges[] = new Edge(0, 2);

// add edge 0-3
$graph->edges[] = new Edge(0, 3);

// add edge 1-3
$graph->edges[] = new Edge(1, 3);

// add edge 2-3
$graph->edges[] = new Edge(2, 3);

// print_r($graph->edges);

// Use a different seed value for every run.
srand(time());

printf(
    "\nCut found by Karger's randomized algo is %d<br/>",
    kargerMinCut($graph)
);
