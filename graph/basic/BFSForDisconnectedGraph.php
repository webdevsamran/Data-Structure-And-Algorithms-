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

    public function BFS($vertice): void
    {
        $this->visited[$vertice] = true;
        $queue = new SplQueue;
        $queue->enqueue($vertice);
        while (!$queue->isEmpty()) {
            $ele = $queue->dequeue();
            echo $ele . " ";
            if (!array_key_exists($ele, $this->vertices)) {
                continue;
            }
            $rem_vertices = $this->vertices[$ele];
            foreach ($rem_vertices as $rem) {
                if (!$this->visited[$rem]) {
                    $this->visited[$rem] = true;
                    $queue->enqueue($rem);
                }
            }
        }
    }

    public function printDisconnectedBFS(): void
    {
        for ($i = 0; $i < $this->size; $i++) {
            if (!$this->visited[$i]) {
                $this->BFS($i);
            }
        }
    }
}

$g = new Graph(4);
$g->addEdge(0, 4);
$g->addEdge(1, 2);
$g->addEdge(1, 3);
$g->addEdge(1, 4);
$g->addEdge(2, 3);
$g->addEdge(3, 4);
$g->printDisconnectedBFS();
