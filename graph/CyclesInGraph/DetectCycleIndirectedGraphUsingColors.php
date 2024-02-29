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
    }

    public function isCyclicUtil($i, &$color): bool
    {
        $color[$i] = "GREY";
        foreach ($this->vertices[$i] as $key => $val) {
            if ($color[$val] == "GREY") {
                return true;
            }
            if ($color[$val] == "WHITE" && $this->isCyclicUtil($val, $color)) {
                return true;
            }
        }
        $color[$i] = "BLACK";
        return false;
    }

    public function isCyclic(): bool
    {
        $color = array();
        for ($i = 0; $i < $this->size; $i++) {
            $color[$i] = "WHITE";
        }
        for ($i = 0; $i < $this->size; $i++) {
            if ($color[$i] == "WHITE" && $this->isCyclicUtil($i, $color)) {
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
