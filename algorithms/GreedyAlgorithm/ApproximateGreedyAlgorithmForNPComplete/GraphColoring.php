<?php

class Graph
{
    public $V;
    public $list;

    function __construct($v)
    {
        $this->V = $v;
        $this->list = array();
    }

    function addEdge($v, $w): void
    {
        $this->list[$v][] = $w;
        $this->list[$w][] = $v;
    }

    function greedyColoring(): void
    {
        $result = array_fill(0, $this->V, -1);
        $result[0] = 0;
        $available = array_fill(0, $this->V, 0);
        for ($u = 1; $u < $this->V; $u++) {
            foreach ($this->list[$u] as $ver) {
                if ($result[$ver] != -1) {
                    $available[$result[$ver]] = 1;
                }
            }
            for ($cr = 0; $cr < $this->V; $cr++) {
                if ($available[$cr] == 0) {
                    break;
                }
            }
            $result[$u] = $cr;
            foreach ($this->list[$u] as $ver) {
                if ($result[$ver] != -1) {
                    $available[$result[$ver]] = 0;
                }
            }
        }
        for ($u = 0; $u < $this->V; $u++)
            echo "Vertex " . $u . " --->  Color " . $result[$u] . "<br/>";
    }

    function __destruct()
    {
        unset($this->list);
    }
}

$graph = new Graph(5);
$graph->addEdge(0, 1);
$graph->addEdge(0, 2);
$graph->addEdge(1, 2);
$graph->addEdge(1, 3);
$graph->addEdge(2, 3);
$graph->addEdge(3, 4);
echo "Coloring of graph 1 <br/>\n";
$graph->greedyColoring();
