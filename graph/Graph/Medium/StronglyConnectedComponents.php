<?php

class Graph{
    public $v;
    public $adj;

    function __construct($v)
    {
        $this->v = $v;
        $this->adj = array();
    }

    function addEdge($u,$v){
        $this->adj[$u][] = $v;
    }

    private function fillOrder($u,&$visited,&$stack){
        $visited[$u] = true;
        foreach($this->adj[$u] as $v){
            if(!$visited[$v]){
                $this->fillOrder($v,$visited,$stack);
            }
        }
        $stack->push($u);
    }

    private function getTranspose(){
        $graph = new Graph($this->v);
        for($v = 0; $v < $this->v ; $v++){
            foreach($this->adj[$v] as $u){
                $graph->adj[$u][] = $v;
            }
        }
        return $graph;
    }

    private function DFSUtil($u,&$visited){
        $visited[$u] = true;
        echo $u . " ";
        foreach($this->adj[$u] as $v){
            if(!$visited[$v]){
                $this->DFSUtil($v,$visited);
            }
        }
    }

    function printSCCs(){
        $stack = new SplStack;
        $visited = array_fill(0,$this->v,0);
        for($i = 0; $i < $this->v; $i++){
            if(!$visited[$i]){
                $this->fillOrder($i,$visited,$stack);
            }
        }
        $gr = $this->getTranspose();
        $visited = array_fill(0,$this->v,0);
        while(!$stack->isEmpty()){
            $v = $stack->pop();
            if(!$visited[$v]){
                $gr->DFSUtil($v,$visited);
                echo "<br/>";
            }
        }
    }
}

$g = new Graph(5);
$g->addEdge(1, 0);
$g->addEdge(0, 2);
$g->addEdge(2, 1);
$g->addEdge(0, 3);
$g->addEdge(3, 4);
echo "Following are strongly connected components in given graph: <br/>";
$g->printSCCs();