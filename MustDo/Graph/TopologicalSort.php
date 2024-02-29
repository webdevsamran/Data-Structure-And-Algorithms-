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

    public function addEdge($u, $v): void
    {
        $this->list[$u][] = $v;
    }

    private function topologicalSortUtil($i, &$visited, &$stack): void
    {
        $visited[$i] = true;
        if (!array_key_exists($i, $this->list)) {
            return;
        }
        foreach ($this->list[$i] as $val) {
            if (!$visited[$val]) {
                $this->topologicalSortUtil($val, $visited, $stack);
            }
        }
        $stack->push($i);
    }

    public function topologicalSort(): void
    {
        $stack = new SplStack;
        $visited = array_fill(0, $this->size, 0);

        for ($i = 0; $i < $this->size; $i++) {
            if ($visited[$i] == false) {
                $this->topologicalSortUtil($i, $visited, $stack);
            }
        }

        while (!$stack->isEmpty()) {
            echo $stack->pop() . " ";
        }

        $visited = [];
    }
}

$graph = new Graph(6);
$graph->addEdge(5, 2);
$graph->addEdge(5, 0);
$graph->addEdge(4, 0);
$graph->addEdge(4, 1);
$graph->addEdge(2, 3);
$graph->addEdge(3, 1);

echo "Following is a Topological Sort of the given graph <br/>\n";

// Function Call
$graph->topologicalSort();
