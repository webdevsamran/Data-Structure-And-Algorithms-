<?php

class Graph
{
    public $size;
    public $vertices;

    function __construct($size)
    {
        $this->size = $size;
        $this->vertices = array();
    }

    public function addEdge($vertice, $edge): void
    {
        $this->vertices[$vertice][] = $edge;
        $this->vertices[$edge][] = $vertice;
    }

    public function isCyclicUtil($i, &$visited, $parent): bool
    {
        $visited[$i] = true;
        foreach ($this->vertices[$i] as $key => $val) {
            if (!$visited[$val] && $this->isCyclicUtil($val, $visited, $i)) {
                return true;
            }
            if ($val != $parent) {
                return true;
            }
        }
        return false;
    }

    public function isCyclic(): bool
    {
        $visited = array();
        for ($i = 0; $i < $this->size; $i++) {
            $visited[$i] = false;
        }
        for ($i = 0; $i < $this->size; $i++) {
            if (!$visited[$i] && $this->isCyclicUtil($i, $visited, -1)) {
                return true;
            }
        }
        return false;
    }
}

$g = new Graph(4);
$g->addEdge(0, 1);
$g->addEdge(0, 2);
$g->addEdge(1, 2);
$g->addEdge(2, 0);
$g->addEdge(2, 3);
$g->addEdge(3, 3);

// Function call
if ($g->isCyclic())
    echo "Graph contains cycle";
else
    echo "Graph doesn't contain cycle";
