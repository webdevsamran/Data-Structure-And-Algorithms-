<?php

class Graph
{
    public $size;
    public $arr;

    function __construct($size)
    {
        $this->size = $size;
        $this->arr = array();
    }

    public function addEdge($v, $w): void
    {
        $this->arr[$v][] = $w;
    }

    public function BFS($start): void
    {
        $visited = array();
        for ($i = 0; $i < $this->size; $i++) {
            $visited[$i] = false;
        }
        $visited[$start] = true;
        $queue = new SplQueue;
        $queue->push($start);
        while (!$queue->isEmpty()) {
            $s = $queue->pop();
            echo $s . "<br/>\n";
            foreach ($this->arr[$s] as $val) {
                if (!$visited[$val]) {
                    $visited[$val] = true;
                    $queue->push($val);
                }
            }
        }
    }
}

$graph = new Graph(4);
$graph->addEdge(0, 1);
$graph->addEdge(0, 2);
$graph->addEdge(1, 2);
$graph->addEdge(2, 0);
$graph->addEdge(2, 3);
$graph->addEdge(3, 3);
$graph->BFS(2);
