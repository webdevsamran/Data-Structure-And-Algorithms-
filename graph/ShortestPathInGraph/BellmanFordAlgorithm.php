<?php

class Edge
{
    public $src;
    public $dest;
    public $weight;
}

class Graph
{
    public $V;
    public $E;
    public $edge;

    function __construct($V, $E)
    {
        $this->V = $V;
        $this->E = $E;
        $this->edge = array();
        for ($i = 0; $i < $E; $i++) {
            $this->edge[$i] = new Edge;
        }
    }

    public function printResult($distance, $size): void
    {
        echo "Distance are: ";
        for ($i = 0; $i < $size; $i++) {
            echo $i . " : " . $distance[$i] . ".";
            echo "<br/>";
        }
    }

    public function bellManFord($start): void
    {
        $V = $this->V;
        $E = $this->E;
        $distance = new SplFixedArray($E);
        for ($i = 0; $i < $E; $i++) {
            $distance[$i] = PHP_INT_MAX;
        }
        $distance[$start] = 0;
        for ($i = 1; $i <= $V; $i++) {
            for ($j = 0; $j < $E; $j++) {
                $src = $this->edge[$j]->src;
                $dest = $this->edge[$j]->dest;
                $weight = $this->edge[$j]->weight;
                if ($distance[$src] != PHP_INT_MAX && $distance[$dest] > $distance[$src] + $weight) {
                    $distance[$dest] = $distance[$src] + $weight;
                }
            }
        }
        for ($j = 0; $j < $E; $j++) {
            $src = $this->edge[$j]->src;
            $dest = $this->edge[$j]->dest;
            $weight = $this->edge[$j]->weight;
            if ($distance[$src] != PHP_INT_MAX && $distance[$dest] > $distance[$src] + $weight) {
                echo "Graph Contains Cycle. <brr/>";
                return;
            }
        }
        $this->printResult($distance, $V);
        return;
    }
}

$V = 5; // Number of vertices in graph
$E = 8; // Number of edges in graph
$graph = new Graph($V, $E);

// add edge 0-1 (or A-B in above figure)
$graph->edge[0]->src = 0;
$graph->edge[0]->dest = 1;
$graph->edge[0]->weight = -1;

// add edge 0-2 (or A-C in above figure)
$graph->edge[1]->src = 0;
$graph->edge[1]->dest = 2;
$graph->edge[1]->weight = 4;

// add edge 1-2 (or B-C in above figure)
$graph->edge[2]->src = 1;
$graph->edge[2]->dest = 2;
$graph->edge[2]->weight = 3;

// add edge 1-3 (or B-D in above figure)
$graph->edge[3]->src = 1;
$graph->edge[3]->dest = 3;
$graph->edge[3]->weight = 2;

// add edge 1-4 (or A-E in above figure)
$graph->edge[4]->src = 1;
$graph->edge[4]->dest = 4;
$graph->edge[4]->weight = 2;

// add edge 3-2 (or D-C in above figure)
$graph->edge[5]->src = 3;
$graph->edge[5]->dest = 2;
$graph->edge[5]->weight = 5;

// add edge 3-1 (or D-B in above figure)
$graph->edge[6]->src = 3;
$graph->edge[6]->dest = 1;
$graph->edge[6]->weight = 1;

// add edge 4-3 (or E-D in above figure)
$graph->edge[7]->src = 4;
$graph->edge[7]->dest = 3;
$graph->edge[7]->weight = -3;

$graph->bellManFord(0);
