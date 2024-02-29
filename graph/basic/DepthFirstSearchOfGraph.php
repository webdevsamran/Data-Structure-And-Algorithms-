<?php

class Graph
{
    public $size;
    public $vertices;
    public $visited;

    function __construct($size)
    {
        $this->size = $size;
        $this->vertices = array();
        $this->visited = array();
        for ($i = 0; $i < $size; $i++) {
            $this->visited[$i] = false;
        }
    }

    public function addEdge($vertice, $edge): void
    {
        $this->vertices[$vertice][] = $edge;
    }

    public function DFS($vertice): void
    {
        $this->visited[$vertice] = true;
        echo $vertice . " ";
        foreach ($this->vertices[$vertice] as $ver) {
            if (!$this->visited[$ver]) {
                $this->DFS($ver);
            }
        }
    }
}

$g = new Graph(4);
$g->addEdge(0, 1);
$g->addEdge(0, 2);
$g->addEdge(1, 2);
$g->addEdge(2, 0);
$g->addEdge(2, 3);
$g->addEdge(3, 3);
$g->DFS(2);
