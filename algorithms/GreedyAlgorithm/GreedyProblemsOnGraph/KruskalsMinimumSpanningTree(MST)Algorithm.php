<?php

class DSU
{
    public $parent;
    public $rank;

    function __construct($size)
    {
        $this->parent = array();
        $this->rank = array();
        for ($i = 0; $i < $size; $i++) {
            $this->parent[$i] = -1;
            $this->rank[$i] = 1;
        }
    }

    public function find($i): int
    {
        if ($this->parent[$i] == -1) {
            return $i;
        }
        return $this->parent[$i] = $this->find($this->parent[$i]);
    }

    public function union($x, $y): void
    {
        $s1 = $this->find($x);
        $s2 = $this->find($y);
        if ($this->rank[$s1] < $this->rank[$s2]) {
            $this->parent[$s1] = $s2;
        } else if ($this->rank[$s1] > $this->rank[$s2]) {
            $this->parent[$s2] = $s1;
        } else {
            $this->parent[$s2] = $s1;
            $this->rank[$s1]++;
        }
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

    public function addEdge($x, $y, $w): void
    {
        $this->list[] = [$w, $x, $y];
    }

    public function kruskals_mst(): void
    {
        sort($this->list, SORT_ASC);
        $s = new DSU($this->size);
        $ans = 0;
        foreach ($this->list as $li) {
            $w = $li[0];
            $x = $li[1];
            $y = $li[2];

            if ($s->find($x) != $s->find($y)) {
                $s->union($x, $y);
                $ans += $w;
                echo $x . " - " . $y . " : " . $w . "<br/>";
            }
        }
        echo "Minimum Cost of Spanning Tree is: " . $ans;
    }
}

$graph = new Graph(4);
$graph->addEdge(0, 1, 10);
$graph->addEdge(1, 3, 15);
$graph->addEdge(2, 3, 4);
$graph->addEdge(2, 0, 6);
$graph->addEdge(0, 3, 5);

// Function call
$graph->kruskals_mst();
