<?php

class Graph{
    public $v;
    public $adj;

    function __construct($v)
    {
        $this->v = $v;
        $this->adj = array();
    }

    function addEdge($u,$v,$w){
        $this->adj[$u][] = [$v,$w];
        $this->adj[$v][] = [$u,$w];
    }

    function shortestPath($src){
        $pq = new SplMaxHeap;
        $dist = array_fill(0,$this->v,PHP_INT_MAX);
        $pq->insert([0,$src]);
        $dist[$src] = 0;
        while(!$pq->isEmpty()){
            $el = $pq->extract();
            $u = $el[1];
            foreach($this->adj[$u] as $ar){
                $v = $ar[0];
                $w = $ar[1];
                if($dist[$v] > $dist[$u] + $w){
                    $dist[$v] = $dist[$u] + $w;
                    $pq->insert([$dist[$v],$v]);
                }
            }
        }
        printf("Vertex Distance from Source<br/>");
        for ($i = 0; $i < $this->v; $i++)
            printf("%d \t\t %d<br/>", $i, $dist[$i]);
    }
}

$V = 9;
$g = new Graph($V);
$g->addEdge(0, 1, 4);
$g->addEdge(0, 7, 8);
$g->addEdge(1, 2, 8);
$g->addEdge(1, 7, 11);
$g->addEdge(2, 3, 7);
$g->addEdge(2, 8, 2);
$g->addEdge(2, 5, 4);
$g->addEdge(3, 4, 9);
$g->addEdge(3, 5, 14);
$g->addEdge(4, 5, 10);
$g->addEdge(5, 6, 2);
$g->addEdge(6, 7, 1);
$g->addEdge(6, 8, 6);
$g->addEdge(7, 8, 7);
$g->shortestPath(0);