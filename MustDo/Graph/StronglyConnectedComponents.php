<?php

class Graph
{
    public $size;
    public $vertices;

    function __construct($size)
    {
        $this->size = $size;
        $this->vertices = array();
    }

    private function DFS($vertice, &$visited): void
    {
        $visited[$vertice] = true;
        echo $vertice . " ";
        if (!array_key_exists($vertice, $this->vertices)) {
            return;
        }
        $rem_vertices = $this->vertices[$vertice];
        foreach ($rem_vertices as $rem) {
            if (!$visited[$rem]) {
                $this->DFS($rem, $visited);
            }
        }
    }

    private function fillOrder($vertice, &$visited, &$stack): void
    {
        $visited[$vertice] = true;
        if (!array_key_exists($vertice, $this->vertices)) {
            $stack->push($vertice);
            return;
        }
        $rem_vertices = $this->vertices[$vertice];
        foreach ($rem_vertices as $rem) {
            if (!$visited[$rem]) {
                $this->fillOrder($rem, $visited, $stack);
            }
        }
        $stack->push($vertice);
    }

    public function transpose()
    {
        $g = new Graph($this->size);
        for ($s = 0; $s < $this->size; $s++) {
            if (!array_key_exists($s, $this->vertices)) {
                continue;
            }
            $vertice = $this->vertices[$s];
            foreach ($vertice as $ver) {
                $g->vertices[$ver][] = $s;
            }
        }
        return $g;
    }

    public function addEdge($vertice, $edge): void
    {
        $this->vertices[$vertice][] = $edge;
    }

    public function printSCC(): void
    {
        $stack = new SplStack;
        $visited = array();
        for ($i = 0; $i < $this->size; $i++) {
            $visited[$i] = false;
        }
        for ($i = 0; $i < $this->size; $i++) {
            if (!$visited[$i]) {
                $this->fillOrder($i, $visited, $stack);
            }
        }
        print_r($stack);
        echo "<br/>";
        $gr = $this->transpose();
        for ($i = 0; $i < $this->size; $i++) {
            $visited[$i] = false;
        }
        while (!$stack->isEmpty()) {
            $s = $stack->pop();
            if (!$visited[$s]) {
                $gr->DFS($s, $visited);
                echo "<br/>";
            }
        }
    }
}

$g = new Graph(5);
$g->addEdge(0,2);
$g->addEdge(0,3);
$g->addEdge(1,0);
$g->addEdge(2,1);
$g->addEdge(3,4);

echo "Strongly Connected Components:<br/>\n";
$g->printSCC();
