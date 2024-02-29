<?php

class Edge
{
    public $u;
    public $v;

    function __construct($_u, $_v)
    {
        $this->u = $_u;
        $this->v = $_v;
    }
}

class Graph
{
    public $V;
    public $E;
    public $count;
    public $list;

    function __construct($v)
    {
        $this->V = $v;
        $this->E = 0;
        $this->count = 0;
        $this->list = array();
    }

    function addEdge($u, $v): void
    {
        $this->list[$u][] = $v;
        $this->E++;
    }

    function BCCUtil($u, &$disc, &$low, &$st, &$parent): void
    {
        static $time = 0;
        $children = 0;
        $disc[$u] = $low[$u] = ++$time;
        foreach ($this->list[$u] as $v) {
            if ($disc[$v] == -1) {
                $children++;
                $parent[$v] = $u;
                $edge = new Edge($u, $v);
                array_push($st, $edge);
                $this->BCCUtil($v, $disc, $low, $st, $parent);
                $low[$u] = min($low[$u], $low[$v]);
                if (($disc[$u] == 1 && $children > 1) || ($disc[$u] > 1 && $low[$v] >= $disc[$u])) {
                    while (sizeof($st) > 0) {
                        $item = array_pop($st);
                        echo $item->u . " - " . $item->v . " ";
                        if ($item->u == $u || $item->v == $v) {
                            break;
                        }
                    }
                    echo "<br/>";
                    $this->count++;
                }
            } else if ($v != $parent[$u]) {
                $low[$u] = min($low[$u], $disc[$v]);
                if ($disc[$v] < $disc[$u]) {
                    $edge = new Edge($u, $v);
                    array_push($st, $edge);
                }
            }
        }
    }

    function BCC(): void
    {
        $disc = array_fill(0, $this->V, -1);
        $low = array_fill(0, $this->V, -1);
        $parent = array_fill(0, $this->V, -1);
        $st = array();

        for ($i = 0; $i < $this->V; $i++) {
            if ($disc[$i] == -1) {
                $this->BCCUtil($i, $disc, $low, $st, $parent);
            }
            $j = 0;
            while (sizeof($st) > 0) {
                $j = 1;
                $item = array_pop($st);
                echo $item->u . " - " . $item->v . " ";
            }
            if ($j == 1) {
                echo "<br/>";
                $this->count++;
            }
        }
    }
}

$graph = new Graph(12);
$graph->addEdge(0, 1);
$graph->addEdge(1, 0);
$graph->addEdge(1, 2);
$graph->addEdge(2, 1);
$graph->addEdge(1, 3);
$graph->addEdge(3, 1);
$graph->addEdge(2, 3);
$graph->addEdge(3, 2);
$graph->addEdge(2, 4);
$graph->addEdge(4, 2);
$graph->addEdge(3, 4);
$graph->addEdge(4, 3);
$graph->addEdge(1, 5);
$graph->addEdge(5, 1);
$graph->addEdge(0, 6);
$graph->addEdge(6, 0);
$graph->addEdge(5, 6);
$graph->addEdge(6, 5);
$graph->addEdge(5, 7);
$graph->addEdge(7, 5);
$graph->addEdge(5, 8);
$graph->addEdge(8, 5);
$graph->addEdge(7, 8);
$graph->addEdge(8, 7);
$graph->addEdge(8, 9);
$graph->addEdge(9, 8);
$graph->addEdge(10, 11);
$graph->addEdge(11, 10);
$graph->BCC();
echo "Above are " . $graph->count . " biconnected components in graph";
