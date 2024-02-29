<?php

class adjList
{
    public $v;
    public $weight;

    function __construct($_v, $_w)
    {
        $this->v = $_v;
        $this->weight = $_w;
    }

    public function getV()
    {
        return $this->v;
    }

    public function getWeight()
    {
        return $this->weight;
    }
}

class Graph
{
    public $size;
    public $list;

    function __construct($size)
    {
        $this->size = $size;
        $this->list = array();
    }

    public function addEdge($u, $v, $weight): void
    {
        $adjList = new adjList($v, $weight);
        $this->list[$u][] = $adjList;
    }

    public function topologicalSortUtil($v, $visited, &$stack): void
    {
        $visited[$v] = true;
        if (!array_key_exists($v, $this->list)) {
            return;
        }
        foreach ($this->list[$v] as $val) {
            if (!$visited[$val->getV()]) {
                $this->topologicalSortUtil($val->getV(), $visited, $stack);
            }
        }
        $stack->push($v);
    }

    public function shortestPath($start): void
    {
        $stack = new SplStack;
        $dist = array();
        $visited = array();
        for ($i = 0; $i < $this->size; $i++) {
            $visited[$i] = false;
        }
        for ($i = 0; $i < $this->size; $i++) {
            if ($visited[$i] == false) {
                $this->topologicalSortUtil($i, $visited, $stack);
            }
        }
        for ($i = 0; $i < $this->size; $i++) {
            $dist[$i] = PHP_INT_MAX;
        }
        $dist[$start] = 0;
        while (!$stack->isEmpty()) {
            $u = $stack->pop();
            if ($dist[$u] != PHP_INT_MAX) {
                if (!array_key_exists($u, $this->list)) {
                    continue;
                }
                foreach ($this->list[$u] as $val) {
                    if ($dist[$val->getV()] > $dist[$u] + $val->getWeight()) {
                        $dist[$val->getV()] = $dist[$u] + $val->getWeight();
                    }
                }
            }
        }
        for ($i = 0; $i < $this->size; $i++) {
            echo ($dist[$i] == PHP_INT_MAX) ? "INF " : $dist[$i] . " ";
        }
    }
}

$graph = new Graph(6);
$graph->addEdge(0, 1, 5);
$graph->addEdge(0, 2, 3);
$graph->addEdge(1, 3, 6);
$graph->addEdge(1, 2, 2);
$graph->addEdge(2, 4, 4);
$graph->addEdge(2, 5, 2);
$graph->addEdge(2, 3, 7);
$graph->addEdge(3, 4, -1);
$graph->addEdge(4, 5, -2);

// print_r($graph->list);

$s = 1;
echo "Following are shortest distances from source " . $s . "<br/>";
$graph->shortestPath($s);
