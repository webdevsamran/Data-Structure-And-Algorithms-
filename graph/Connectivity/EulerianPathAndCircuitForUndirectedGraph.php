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

    function DFSUtil($u, &$visited): void
    {
        $visited[$u] = true;
        foreach ($this->list[$u] as $v) {
            if (!$visited[$v]) {
                $this->DFSUtil($v, $visited);
            }
        }
    }

    function isConnected(): bool
    {
        $visited = array_fill(0, $this->V, 0);
        $i = NULL;
        for ($i = 0; $i < $this->V; $i++) {
            if (sizeof($this->list[$i]) != 0) {
                break;
            }
        }
        if ($i == $this->V) {
            return 0;
        }
        $this->DFSUtil($i, $visited);
        for ($i = 0; $i < $this->V; $i++) {
            if (!$visited[$i] && sizeof($this->list[$i]) > 0) {
                return false;
            }
        }
        return true;
    }

    function isEulerian(): int
    {
        if ($this->isConnected() == false) {
            return 0;
        }
        $odd = 0;
        for ($i = 0; $i < $this->V; $i++) {
            if (sizeof($this->list[$i]) & 1) {
                $odd++;
            }
        }
        if ($odd > 2) {
            return 0;
        }
        return $odd ? 1 : 2;
    }
}

function test(&$graph)
{
    $result = $graph->isEulerian();
    if ($result == 0) {
        echo "Not Eulerian<br/>";
    } else if ($result == 1) {
        echo "Has Euler Path<br/>";
    } else {
        echo "Has Euler Cycle<br/>";
    }
}

$graph = new Graph(5);
$graph->addEdge(1, 0);
$graph->addEdge(0, 2);
$graph->addEdge(2, 1);
$graph->addEdge(0, 3);
$graph->addEdge(3, 4);
test($graph);
