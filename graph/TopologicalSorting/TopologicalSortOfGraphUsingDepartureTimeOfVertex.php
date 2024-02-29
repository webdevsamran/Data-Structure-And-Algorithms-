<?php

error_reporting(0);

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

    private function topologicalSortUtil($i, &$visited, &$departure, &$time): void
    {
        $visited[$i] = true;
        foreach ($this->list[$i] as $val) {
            if (!$visited[$val]) {
                $this->topologicalSortUtil($val, $visited, $departure, $time);
            }
        }
        $departure[$time++] = $i;
    }

    public function topologicalSort(): void
    {
        $departure = array_fill(0, $this->size, -1);
        $visited = array_fill(0, $this->size, 0);
        $time = 0;

        for ($i = 0; $i < $this->size; $i++) {
            if ($visited[$i] == false) {
                $this->topologicalSortUtil($i, $visited, $departure, $time);
            }
        }

        for ($i = $this->size - 1; $i >= 0; $i--) {
            echo $departure[$i] . " ";
        }
    }

    public function __destruct()
    {
        $this->list = array();
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
