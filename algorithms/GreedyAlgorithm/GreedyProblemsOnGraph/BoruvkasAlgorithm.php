<?php

class Graph
{
    public $size;
    public $graph;

    function __construct($size)
    {
        $this->size = $size;
        $this->graph = array();
    }

    public function addEdge($u, $v, $w): void
    {
        $this->graph[] = [$u, $v, $w];
    }

    private function find(&$parent, $i): int
    {
        if ($parent[$i] == $i) {
            return $i;
        }
        return $this->find($parent, $parent[$i]);
    }

    private function union(&$parent, &$rank, $x, $y): void
    {
        $xroot = $this->find($parent, $x);
        $yroot = $this->find($parent, $y);

        if ($rank[$xroot] < $rank[$yroot]) {
            $parent[$xroot] = $yroot;
        } else if ($rank[$xroot] > $rank[$yroot]) {
            $parent[$yroot] = $xroot;
        } else {
            $parent[$yroot] = $xroot;
            $rank[$xroot]++;
        }
    }

    public function boruvkaMST(): void
    {
        $parent = array();
        $rank = array();
        $cheapest = array();
        for ($i = 0; $i < $this->size; $i++) {
            $cheapest[$i] = [-1, -1, -1];
        }
        $numTrees = $this->size;
        $MSTweight = 0;

        for ($node = 0; $node < $this->size; $node++) {
            $parent[$node] = $node;
            $rank[$node] = 0;
        }

        while ($numTrees > 1) {
            for ($i = 0; $i < sizeof($this->graph); $i++) {
                $u = $this->graph[$i][0];
                $v = $this->graph[$i][1];
                $w = $this->graph[$i][2];

                $set1 = $this->find($parent, $u);
                $set2 = $this->find($parent, $v);

                if ($set1 != $set2) {
                    if ($cheapest[$set1][2] == -1 || $cheapest[$set1][2] > $w) {
                        $cheapest[$set1] = [$u, $v, $w];
                    }
                    if ($cheapest[$set2][2] == -1 || $cheapest[$set2][2] > $w) {
                        $cheapest[$set2] = [$u, $v, $w];
                    }
                }
            }
            for ($node = 0; $node < $this->size; $node++) {
                if ($cheapest[$node][2] != -1) {
                    $u = $cheapest[$node][0];
                    $v = $cheapest[$node][1];
                    $w = $cheapest[$node][2];

                    $set1 = $this->find($parent, $u);
                    $set2 = $this->find($parent, $v);

                    if ($set1 != $set2) {
                        $MSTweight += $w;
                        $this->union($parent, $rank, $set1, $set2);
                        echo $u . " - " . $v . " : " . $w . "<br/>";
                        $numTrees--;
                    }
                }
            }
            for ($node = 0; $node < $this->size; $node++) {
                $cheapest[$node][2] = -1;
            }
            echo "Weight of MST is: " . $MSTweight;
        }
    }
}

$graph = new Graph(4);
$graph->addEdge(0, 1, 10);
$graph->addEdge(0, 2, 6);
$graph->addEdge(0, 3, 5);
$graph->addEdge(1, 3, 15);
$graph->addEdge(2, 3, 4);

$graph->boruvkaMST();
