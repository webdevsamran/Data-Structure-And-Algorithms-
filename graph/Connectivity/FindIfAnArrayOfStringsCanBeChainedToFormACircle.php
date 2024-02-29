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
        $visited = array();
        for ($i = 0; $i < $this->V; $i++) {
            $visited[$i] = 0;
        }
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
        $visited = array();
        for ($i = 0; $i < $this->V; $i++) {
            $visited[$i] = 0;
        }
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
            if (!array_key_exists($i, $this->list)) {
                continue;
            }
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

function canBeChained($words, $size): bool
{
    $graph = new Graph(26);
    for ($i = 0; $i < $size; $i++) {
        $s = $words[$i];
        $i = ord($s[0]) - ord('a');
        $j = ord($s[strlen($s) - 1]) - ord('a');
        $graph->addEdge($i, $j);
    }
    return $graph->isEulerianCycle();
}

$arr =  ["for", "geek", "rig", "kaf"];
$size = sizeof($arr);
echo canBeChained($arr, $size) ?  "Can be chained \n" : "Can't be chained \n";
