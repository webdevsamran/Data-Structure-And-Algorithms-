<?php

class Graph
{
    public $V;
    public $list;
    public $in;

    function __construct($v)
    {
        $this->V = $v;
        $this->list = array();
        $this->in = array_fill(0, $v, 0);
    }

    function addEdge($u, $v): void
    {
        $this->list[$u][] = $v;
        $this->in[$v]++;
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

    public function getTranspose()
    {
        $g = new Graph($this->V);
        for ($s = 0; $s < $this->V; $s++) {
            if (!array_key_exists($s, $this->list)) {
                continue;
            }
            $vertice = $this->list[$s];
            foreach ($vertice as $ver) {
                $g->list[$ver][] = $s;
                $g->in[$s]++;
            }
        }
        return $g;
    }

    function isSC(): bool
    {
        $visited = array_fill(0, $this->V, 0);
        $k = NULL;
        for ($k = 0; $k < $this->V; $k++) {
            if (sizeof($this->list[$k]) > 0) {
                break;
            }
        }
        $this->DFSUtil($k, $visited);
        for ($i = 0; $i < $this->V; $i++) {
            if (!$visited[$i] && sizeof($this->list[$i]) > 0) {
                return false;
            }
        }
        $gr = $this->getTranspose();
        $visited = array_fill(0, $this->V, 0);
        $gr->DFSUtil($k, $visited);
        for ($i = 0; $i < $this->V; $i++) {
            if (!$visited[$i] && sizeof($this->list[$i]) > 0) {
                return false;
            }
        }
        return true;
    }

    function isEulerianCycle(): bool
    {
        if ($this->isSC() == false) {
            return false;
        }
        for ($i = 0; $i < $this->V; $i++) {
            if (sizeof($this->list[$i]) != $this->in[$i]) {
                return false;
            }
        }
        return true;
    }

    function __destruct()
    {
        unset($this->list);
        unset($this->in);
    }
}

$graph = new Graph(5);
$graph->addEdge(1, 0);
$graph->addEdge(0, 2);
$graph->addEdge(2, 1);
$graph->addEdge(0, 3);
$graph->addEdge(3, 4);
$graph->addEdge(4, 0);

if ($graph->isEulerianCycle())
    echo "Given directed graph is eulerian.";
else
    echo "Given directed graph is NOT eulerian.";
