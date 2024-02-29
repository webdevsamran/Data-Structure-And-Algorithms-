<?php

error_reporting(0);

class Graph
{
    public $size;
    public $list;
    public $indegee;

    function __construct($size)
    {
        $this->size = $size;
        $this->list = array();
        $this->indegee = array_fill(0, $size, 0);
    }

    public function addEdge($u, $v): void
    {
        $this->list[$u][] = $v;
        $this->indegee[$v]++;
    }

    private function topologicalSort(): array
    {
        $topological = array();
        $queue = new SplQueue;

        for ($i = 0; $i < $this->size; $i++) {
            if ($this->indegee[$i] == 0) {
                $queue->enqueue($i);
            }
        }

        while (!$queue->isEmpty()) {
            $t = $queue->dequeue();
            array_push($topological, $t);
            foreach ($this->list[$t] as $el) {
                $this->indegee[$el]--;
                if ($this->indegee[$el] == 0) {
                    $queue->enqueue($el);
                }
            }
        }

        return $topological;
    }

    public function maximumEdgeAddition(): void
    {
        $visited = array_fill(0, $this->size, 0);
        $topo = $this->topologicalSort();

        for ($i = 0; $i < sizeof($topo); $i++) {
            $t = $topo[$i];
            foreach ($this->list[$t] as $el) {
                $visited[$el] = true;
            }
            for ($j = $i + 1; $j < sizeof($topo); $j++) {
                if (!$visited[$topo[$j]]) {
                    echo $t . " - " . $topo[$j] . " ";
                }
                $visited[$topo[$j]] = false;
            }
        }
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
$graph->maximumEdgeAddition();
