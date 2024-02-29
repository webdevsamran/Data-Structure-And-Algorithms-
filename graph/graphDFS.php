<?php

class Graph
{
    public $vertices;
    public $visited;
    public $size;

    function __construct($size)
    {
        $this->size = $size;
        $this->vertices = array();
        $this->visited = array();
    }

    public function addEdge($vertice, $edge): void
    {
        $this->vertices[$vertice][] = $edge;
    }

    public function DFS($startVertice): void
    {
        for ($i = 0; $i < $this->size; $i++) {
            $this->visited[$i] = false;
        }
        $this->visited[$startVertice] = true;
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
                if (!$this->visited[$rem]) {
                    $this->visited[$rem] = true;
                    $stack->push($rem);
                }
            }
        }
        echo "<br/>";
    }
}

$graph = new Graph(5);
$graph->addEdge(0, 1);
$graph->addEdge(0, 2);
$graph->addEdge(0, 3);
$graph->addEdge(1, 0);
$graph->addEdge(1, 2);
$graph->addEdge(2, 0);
$graph->addEdge(2, 1);
$graph->addEdge(2, 4);
$graph->addEdge(3, 0);
$graph->DFS(0);
