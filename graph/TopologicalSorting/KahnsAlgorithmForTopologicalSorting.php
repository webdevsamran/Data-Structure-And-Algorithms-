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

    public function topologicalSort(): void
    {
        $in_degree = array_fill(0, $this->size, 0);
        for ($i = 0; $i < $this->size; $i++) {
            if (!array_key_exists($i, $this->list)) {
                continue;
            }
            foreach ($this->list[$i] as $el) {
                $in_degree[$el]++;
            }
        }

        $queue = new SplQueue;
        for ($i = 0; $i < $this->size; $i++) {
            if ($in_degree[$i] == 0) {
                $queue->enqueue($i);
            }
        }

        $cnt = 0;
        $top_order = array();

        while (!$queue->isEmpty()) {
            $u = $queue->dequeue();
            array_push($top_order, $u);
            if (!array_key_exists($u, $this->list)) {
                continue;
            }
            foreach ($this->list[$u] as $el) {
                if (--$in_degree[$el] == 0) {
                    $queue->enqueue($el);
                }
            }
            $cnt++;
        }

        if ($cnt != $this->size) {
            echo "There is Cycle in Graph.<br/>";
            return;
        }
        for ($i = 0; $i < sizeof($top_order); $i++) {
            echo $top_order[$i] . " ";
        }
        echo "<br/>";
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
