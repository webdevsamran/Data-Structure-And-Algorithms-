<?php

class Graph
{
    public $size;
    public $vertices;
    public $visited;
    public $tc;

    function __construct($size)
    {
        $this->size = $size;
        $this->vertices = array();

        $this->visited = array();
        for ($i = 0; $i < $size; $i++) {
            $this->visited[$i] = 0;
        }

        $this->tc = array();
        for ($i = 0; $i < $size; $i++) {
            for ($j = 0; $j < $size; $j++) {
                $this->tc[$i][$j] = 0;
            }
        }
    }

    public function addEdge($vertice, $edge): void
    {
        $this->vertices[$vertice][] = $edge;
    }

    public function DFS($s, $v): void
    {
        $this->tc[$s][$v] = true;
        foreach ($this->vertices[$v] as $ver) {
            if (!$this->tc[$s][$ver]) {
                if ($ver == $s) {
                    $this->tc[$s][$ver] = true;
                } else {
                    $this->DFS($s, $ver);
                }
            }
        }
    }

    public function transitiveClosure(): void
    {
        for ($i = 0; $i < $this->size; $i++) {
            $this->DFS($i, $i);
        }
        for ($i = 0; $i < $this->size; $i++) {
            for ($j = 0; $j < $this->size; $j++) {
                echo $this->tc[$i][$j] . " ";
            }
            echo "<br/>";
        }
    }
}

$g = new Graph(4);
$g->addEdge(0, 1);
$g->addEdge(0, 2);
$g->addEdge(1, 2);
$g->addEdge(2, 0);
$g->addEdge(2, 3);
$g->addEdge(3, 3);
echo "Transitive closure matrix is \n";
$g->transitiveClosure();
