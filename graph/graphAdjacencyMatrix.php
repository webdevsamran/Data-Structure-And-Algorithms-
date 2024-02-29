<?php

class Graph
{
    public $matrix;
    public $size;

    function __construct($size)
    {
        $this->size = $size;
        $this->matrix = array();
        for ($i = 0; $i < $size; $i++) {
            $this->matrix[$i] = array();
            for ($j = 0; $j < $size; $j++) {
                $this->matrix[$i][$j] = 0;
            }
        }
    }

    public function addEdge($i, $j): void
    {
        $this->matrix[$i][$j] = 1;
        $this->matrix[$j][$i] = 1;
    }

    public function removeEdge($i, $j): void
    {
        $this->matrix[$i][$j] = 0;
        $this->matrix[$j][$i] = 0;
    }

    public function print(): void
    {
        for ($i = 0; $i < $this->size; $i++) {
            echo $i . " => ";
            for ($j = 0; $j < $this->size; $j++) {
                echo $this->matrix[$i][$j] . " ";
            }
            echo "<br/>";
        }
    }
}

$graph = new Graph(4);
$graph->addEdge(0, 1);
$graph->addEdge(0, 2);
$graph->addEdge(0, 3);
$graph->addEdge(1, 0);
$graph->addEdge(1, 2);
$graph->addEdge(2, 0);
$graph->addEdge(2, 1);
$graph->addEdge(3, 0);
$graph->print();
