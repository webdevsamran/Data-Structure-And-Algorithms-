<?php

class Graph
{
    public $size;
    public $list;
    public $edges;

    function __construct($size)
    {
        $this->size = $size;
        $this->list = array();
        $this->edges = array();
    }

    public function addEdge($u, $v, $w): void
    {
        $this->list[$u][] = $v;
        $this->list[$v][] = $u;
        $this->edges[] = [$w, [$u, $v]];
    }

    public function DFS($v, &$visited): void
    {
        $visited[$v] = true;
        foreach ($this->list[$v] as $val) {
            if (!$visited[$val]) {
                $this->DFS($val, $visited);
            }
        }
    }

    public function isConnected(): bool
    {
        $visited = array_fill(0, $this->size, 0);
        $this->DFS(0, $visited);
        for ($i = 1; $i < $this->size; $i++) {
            if ($visited[$i] == false) {
                return false;
            }
        }
        return true;
    }

    public function reverseDeleteMST(): void
    {
        sort($this->edges);
        $mst_wt = 0;
        echo "Edges in MST: <br/>";
        for ($i = sizeof($this->edges) - 1; $i >= 0; $i--) {
            $u = $this->edges[$i][1][0];
            $v = $this->edges[$i][1][1];

            $u_ind = array_search($v, $this->list[$u]);
            $v_ind = array_search($u, $this->list[$v]);
            unset($this->list[$u][$u_ind]);
            unset($this->list[$v][$v_ind]);

            if ($this->isConnected() == false) {
                $this->list[$u][] = $v;
                $this->list[$v][] = $u;

                echo "(" . $u . "," . $v . ")<br/>";
                $mst_wt += $this->edges[$i][0];
            }
        }

        echo "Total Weight of MST is : " . $mst_wt;
    }
}

$V = 9;
$graph = new Graph($V);

//  making above shown graph
$graph->addEdge(0, 1, 4);
$graph->addEdge(0, 7, 8);
$graph->addEdge(1, 2, 8);
$graph->addEdge(1, 7, 11);
$graph->addEdge(2, 3, 7);
$graph->addEdge(2, 8, 2);
$graph->addEdge(2, 5, 4);
$graph->addEdge(3, 4, 9);
$graph->addEdge(3, 5, 14);
$graph->addEdge(4, 5, 10);
$graph->addEdge(5, 6, 2);
$graph->addEdge(6, 7, 1);
$graph->addEdge(6, 8, 6);
$graph->addEdge(7, 8, 7);

$graph->reverseDeleteMST();
