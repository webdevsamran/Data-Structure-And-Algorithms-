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

    public function BFS($startVertice): void
    {
        $visited = array();
        for ($i = 0; $i < $this->size; $i++) {
            $visited[$i] = false;
        }
        $visited[$startVertice] = true;
        $stack = new SplStack;
        $stack->push($startVertice);
        while (!$stack->isEmpty()) {
            $vertice = $stack->pop();
            echo $vertice . " ";
            if (!array_key_exists($vertice, $this->vertices)) {
                continue;
            }
            $rem_vertice = $this->vertices[$vertice];
            foreach ($rem_vertice as $rem) {
                if (!$visited[$rem]) {
                    $visited[$rem] = true;
                    $stack->push($rem);
                }
            }
        }
        echo "<br/>";
    }
}

$g = new Graph(4);
$g->addEdge(0, 1);
$g->addEdge(0, 2);
$g->addEdge(1, 2);
$g->addEdge(2, 0);
$g->addEdge(2, 3);
$g->addEdge(3, 3);
$g->BFS(2);
