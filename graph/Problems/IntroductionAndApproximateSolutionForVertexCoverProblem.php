<?php

class Graph{
    public $V;
    public $adj;

    function __construct($V)
    {
        $this->V = $V;
        $this->adj = array();
    }

    function addEdge($u,$v){
        $this->adj[$u][] = $v;
        $this->adj[$v][] = $u;
    }

    function printVertexCover(){
        $visited = array_fill(0,$this->V,0);
        for($u = 0; $u < $this->V; $u++){
            if(!$visited[$u]){
                foreach($this->adj[$u] as $v){
                    if(!$visited[$v]){
                        $visited[$u] = true;
                        $visited[$v] = true;
                        break;
                    }
                }
            }
        }
        for($i = 0; $i < $this->V; $i++){
            if($visited[$i]){
                echo $i . " ";
            }
        }
    }
}

$graph = new Graph(7);
$graph->addEdge(0, 1);
$graph->addEdge(0, 2);
$graph->addEdge(1, 3);
$graph->addEdge(3, 4);
$graph->addEdge(4, 5);
$graph->addEdge(5, 6);

$graph->printVertexCover();