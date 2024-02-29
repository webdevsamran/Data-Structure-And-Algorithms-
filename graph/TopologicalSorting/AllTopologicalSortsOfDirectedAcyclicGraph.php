<?php

error_reporting(0);

class Graph
{
    public $size;
    public $list;
    public $indegee;

    function __construct($size)
    {
        $this->size = $size;
        $this->list = array();
        $this->indegee = array_fill(0, $size, 0);
    }

    public function addEdge($u, $v): void
    {
        $this->list[$u][] = $v;
        $this->indegee[$v]++;
    }

    private function alltopologicalSortUtil(&$res, &$visited): void
    {
        $flag = false;

        for ($i = 0; $i < $this->size; $i++) {
            if ($this->indegee[$i] == 0 && !$visited[$i]) {
                foreach ($this->list[$i] as $j) {
                    $this->indegee[$j]--;
                }
                $res[] = $i;
                $visited[$i] = true;
                $this->alltopologicalSortUtil($res, $visited);

                $visited[$i] = false;
                array_pop($res);
                foreach ($this->list[$i] as $j) {
                    $this->indegee[$j]++;
                }
                $flag = true;
            }
        }

        if (!$flag) {
            for ($i = 0; $i < sizeof($res); $i++) {
                echo $res[$i] . " ";
            }
            echo "<br/>";
        }
    }

    public function alltopologicalSort(): void
    {
        $stack = new SplStack;
        $visited = array_fill(0, $this->size, 0);

        $res = array();
        $this->alltopologicalSortUtil($res, $visited);
    }
}

$graph = new Graph(6);
$graph->addEdge(5, 2);
$graph->addEdge(5, 0);
$graph->addEdge(4, 0);
$graph->addEdge(4, 1);
$graph->addEdge(2, 3);
$graph->addEdge(3, 1);

echo "Following is a Topological Sort of the given graph <br/>\n";

// Function Call
$graph->alltopologicalSort();
