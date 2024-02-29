<?php

class Graph
{
    public $V;
    public $list;

    function __construct($V)
    {
        $this->V = $V;
        $this->list = array();
    }

    function addEdge($u, $v): void
    {
        $this->list[$u][] = $v;
        $this->list[$v][] = $u;
    }

    function bridgeUtil($u, &$visited, &$disc, &$low, &$parent): void
    {
        static $time = 0;
        $visited[$u] = true;
        $disc[$u] = $low[$u] = ++$time;
        foreach ($this->list[$u] as $v) {
            if (!$visited[$v]) {
                $parent[$v] = $u;
                $this->bridgeUtil($v, $visited, $disc, $low, $parent);
                $low[$u] = min($low[$u], $low[$v]);
                if ($low[$v] > $disc[$u]) {
                    echo $u . " " . $v . " <br/>";
                }
            } else if ($v != $parent[$u]) {
                $low[$u] = min($low[$u], $disc[$v]);
            }
        }
    }

    function bridge(): void
    {
        $parent = array_fill(0, $this->V, -1);
        $visited = array_fill(0, $this->V, 0);
        $disc = array_fill(0, $this->V, 0);
        $low = array_fill(0, $this->V, 0);

        for ($i = 0; $i < $this->V; $i++) {
            if (!$visited[$i]) {
                $this->bridgeUtil($i, $visited, $disc, $low, $parent);
            }
        }
    }
}

echo "Bridges in first graph <br/>\n";
$graph = new Graph(5);
$graph->addEdge(1, 0);
$graph->addEdge(0, 2);
$graph->addEdge(2, 1);
$graph->addEdge(0, 3);
$graph->addEdge(3, 4);
$graph->bridge();
