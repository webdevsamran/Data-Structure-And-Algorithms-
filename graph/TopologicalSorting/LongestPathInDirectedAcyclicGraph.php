<?php

class AdjListNode
{
    public $v;
    public $weight;

    function __construct($_v, $_w)
    {
        $this->v = $_v;
        $this->weight = $_w;
    }

    function getV(): int
    {
        return $this->v;
    }

    function getWeight(): int
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
        $node = new AdjListNode($v, $weight);
        $this->list[$u][] = $node;
    }

    public function topologicalSortUtil($v, &$visited, &$stack): void
    {
        $visited[$v] = true;
        foreach ($this->list[$v] as $el) {
            if (!$visited[$el->getV()]) {
                $this->topologicalSortUtil($el->getV(), $visited, $stack);
            }
        }
        $stack->push($v);
    }

    public function longestPath($s): void
    {
        $stack = new SplStack;
        $dist = array_fill(0, $this->size, PHP_INT_MIN);
        $visited = array_fill(0, $this->size, 0);
        $dist[$s] = 0;
        for ($i = 0; $i < $this->size; $i++) {
            if (!$visited[$i]) {
                $this->topologicalSortUtil($i, $visited, $stack);
            }
        }
        while (!$stack->isEmpty()) {
            $u = $stack->pop();
            if ($dist[$u] != PHP_INT_MIN) {
                foreach ($this->list[$u] as $el) {
                    if ($dist[$el->getV()] < $dist[$u] + $el->getWeight()) {
                        $dist[$el->getV()] = $dist[$u] + $el->getWeight();
                    }
                }
            }
        }

        for ($i = 0; $i < $this->size; $i++) {
            echo ($dist[$i] == PHP_INT_MIN) ? "INF" : $dist[$i] . " ";
        }
        echo "<br/>";
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
$graph->addEdge(3, 5, 1);
$graph->addEdge(3, 4, -1);
$graph->addEdge(4, 5, -2);

$s = 1;
echo "Following are longest distances from source vertex " . $s . "<br/>";
$graph->longestPath($s);
